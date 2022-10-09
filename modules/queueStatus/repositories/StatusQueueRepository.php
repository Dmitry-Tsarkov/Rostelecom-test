<?php

namespace app\modules\queueStatus\repositories;

use app\modules\queueStatus\models\StatusQueue;
use RuntimeException;

class StatusQueueRepository
{
    public function save(StatusQueue $StatusQueue): void
    {
        if(!$StatusQueue->save()){
            throw new RuntimeException('Ошибка сохраненеия');
        }
    }

    public function count(): int
    {
        return StatusQueue::find()->count('c_id');
    }

    public function delete(StatusQueue $statusQueue): void
    {
        if (!$statusQueue->delete()) {
            throw new RuntimeException('Ошибка удаления');
        }
    }

    /**
     * @return StatusQueue[]
     */
    public function getAll(): array
    {
        if(!$queueStatues = StatusQueue::find()->all()){
            throw new RuntimeException('В таблице нет записей');
        }

        return $queueStatues;
    }

    public function findOne():? StatusQueue
    {
        return StatusQueue::find()->one();
    }
}
