<?php

namespace App\Services;

use App\Models\Evaluation;
use App\Models\Training;

class RecommenderService
{
    /**
     * Get recommended trainings for a participant
     *
     * @param int $participantId
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    public function recommendTrainings(int $participantId, int $limit = 5)
    {
        // 1. Get participant's past evaluations
        $evaluations = Evaluation::where('participant_id', $participantId)->get();

        if ($evaluations->isEmpty()) {
            // No history, return top-rated trainings
            return Training::orderBy('id', 'desc')->take($limit)->get();
        }

        // 2. Compute participant's average scores per training aspect
        $userProfile = [
            'relevance_current_work' => 0,
            'relevance_future_work' => 0,
            'info_amount' => 0,
            'info_usefulness' => 0,
            'overall_rating' => 0,
        ];

        foreach ($evaluations as $eval) {
            $userProfile['relevance_current_work'] += $eval->relevance_current_work ?? 0;
            $userProfile['relevance_future_work']  += $eval->relevance_future_work ?? 0;
            $userProfile['info_amount']            += $eval->info_amount ?? 0;
            $userProfile['info_usefulness']        += $eval->info_usefulness ?? 0;
            $userProfile['overall_rating']         += $eval->overall_rating ?? 0;
        }

        $count = $evaluations->count();
        foreach ($userProfile as $key => $value) {
            $userProfile[$key] = $value / $count; // average
        }

        // 3. Compare user profile with all trainings
        $trainings = Training::with('evaluations')->get();
        $similarities = [];

        foreach ($trainings as $training) {
            $trainEval = $training->evaluations()->get();
            if ($trainEval->isEmpty()) continue;

            $trainProfile = [
                'relevance_current_work' => $trainEval->avg('relevance_current_work'),
                'relevance_future_work'  => $trainEval->avg('relevance_future_work'),
                'info_amount'            => $trainEval->avg('info_amount'),
                'info_usefulness'        => $trainEval->avg('info_usefulness'),
                'overall_rating'         => $trainEval->avg('overall_rating'),
            ];

            // Cosine similarity
            $similarities[$training->id] = $this->cosineSimilarity($userProfile, $trainProfile);
        }

        // 4. Sort trainings by similarity descending
        arsort($similarities);

        $recommendedTrainings = Training::whereIn('id', array_keys(array_slice($similarities, 0, $limit, true)))->get();

        return $recommendedTrainings;
    }

    /**
     * Compute cosine similarity between two associative arrays
     */
    private function cosineSimilarity(array $a, array $b)
    {
        $dot = 0;
        $normA = 0;
        $normB = 0;

        foreach ($a as $key => $value) {
            $dot += ($value * ($b[$key] ?? 0));
            $normA += $value * $value;
            $normB += ($b[$key] ?? 0) * ($b[$key] ?? 0);
        }

        return $normA && $normB ? $dot / (sqrt($normA) * sqrt($normB)) : 0;
    }
}
