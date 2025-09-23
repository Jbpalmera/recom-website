<?php 
use App\Services\RecommenderService;

class RecommendationController extends Controller
{
    public function recommend($participantId)
    {
        $recommender = new RecommenderService();
        $trainings = $recommender->recommendTrainings($participantId, 5);

        return view('recommendations.index', compact('trainings'));
    }
}
