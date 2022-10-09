<?php

namespace app\modules\queueStatus\services;

use app\modules\queueStatus\models\StatusQueue;
use app\modules\queueStatus\repositories\StatusQueueRepository;
use app\modules\queueStatus\forms\StatusQueueForm;
use DomainException;

class StatusQueueService
{
    private $statusQueueRepository;

    public function __construct(StatusQueueRepository $statusQueueRepository)
    {
        $this->statusQueueRepository = $statusQueueRepository;
    }

    public function create(StatusQueueForm $statusQueueForm): StatusQueue
    {
        if ($this->statusQueueRepository->count()) {
            throw new DomainException('В таблице уже есть данные');
        }

        $statusQueue = StatusQueue::create(
            $statusQueueForm->c_id,
            $statusQueueForm->s_name,
            $statusQueueForm->c_name,
            $statusQueueForm->a_type,
            $statusQueueForm->direction,
            $statusQueueForm->activation,
            $statusQueueForm->c_state,
            $statusQueueForm->control
        );

        $this->statusQueueRepository->save($statusQueue);
        return $statusQueue;
    }

    public function clear()
    {
        $statusQueues = $this->statusQueueRepository->getAll();
        foreach ($statusQueues as $statusQueue) {
            $this->statusQueueRepository->delete($statusQueue);
        }
    }
}
