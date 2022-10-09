<?php

namespace app\modules\status\repositories;

use app\modules\status\models\Status;
use RuntimeException;
use yii\web\NotFoundHttpException;

class StatusRepository
{
    public function save(Status $status): void
    {
        if(!$status->save()){
            throw new RuntimeException('Ошибка сохраненеия');
        }
    }

    public function delete(Status $statusQueue): void
    {
        if (!$statusQueue->delete()) {
            throw new RuntimeException('Ошибка удаления');
        }
    }

    public function getById($id): Status
    {
        $status = Status::findOne($id);

        if (null == $status) {
            throw new NotFoundHttpException('Модель не найдена');
        }

        return $status;
    }

}