<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TrainingFeedback;
use League\Csv\Writer;
use SplTempFileObject;

class ExportFeedback extends Command
{
    protected $signature = 'export:feedback';
    protected $description = 'Export training feedback for model training';

    public function handle()
    {
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['user_id', 'training_id', 'rating']);

        TrainingFeedback::chunk(100, function ($feedbacks) use ($csv) {
            foreach ($feedbacks as $feedback) {
                $csv->insertOne([
                    $feedback->user_id,
                    $feedback->training_id,
                    $feedback->rating
                ]);
            }
        });

        file_put_contents(storage_path('app/feedback.csv'), $csv->toString());

        $this->info('✅ Feedback exported to storage/app/feedback.csv');
    }
}
