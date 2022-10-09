<?php

namespace app\modules\status\seeders;

use app\modules\seeder\components\BaseSeeder;
use app\modules\queueStatus\models\StatusQueue;
use app\modules\status\models\Status;
use yii\helpers\Console;

class StatusSeeder extends BaseSeeder
{
    public function seed($amountOfStatuses)
    {
        $types = [
            StatusQueue::TYPE_ONE,
            StatusQueue::TYPE_TWO,
            StatusQueue::TYPE_THREE,
        ];

        Console::stdout(PHP_EOL . 'statuses');
        for ($i = 1; $i <= $amountOfStatuses; $i++) {
            $statusQueue = Status::create(
                $this->faker->word. $i,
                $this->faker->realText(10),
                $this->faker->realText(10),
                $this->faker->randomElement($types),
                $this->faker->realText(20),
                $this->faker->realText(15),
                $this->faker->realText(10),
                $this->faker->realText(10)
            );
            $statusQueue->save();
            Console::stdout('.');
        }
    }
}
