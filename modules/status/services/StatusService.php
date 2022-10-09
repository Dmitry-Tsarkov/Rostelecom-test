<?php

namespace app\modules\status\services;

use app\modules\status\forms\StatusForm;
use app\modules\status\models\Status;
use app\modules\status\repositories\StatusRepository;

class StatusService
{
    private $statuses;

    public function __construct(StatusRepository $statuses)
    {
        $this->statuses = $statuses;
    }

    public function create(StatusForm $createForm): Status
    {
        $status = Status::create(
            $createForm->c_id,
            $createForm->s_name,
            $createForm->c_name,
            $createForm->a_type,
            $createForm->direction,
            $createForm->activation,
            $createForm->c_state,
            $createForm->control
        );

        $this->statuses->save($status);
        return $status;
    }

    public function delete($id)
    {
        $status = $this->statuses->getById($id);
        $this->statuses->delete($status);
    }
}