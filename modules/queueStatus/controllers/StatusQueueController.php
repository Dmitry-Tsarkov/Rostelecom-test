<?php

namespace app\modules\queueStatus\controllers;

use app\modules\queueStatus\repositories\StatusQueueRepository;
use app\modules\queueStatus\services\StatusQueueService;
use app\modules\queueStatus\forms\StatusQueueForm;
use DomainException;
use RuntimeException;
use Yii;
use yii\web\Controller;

class StatusQueueController extends Controller
{
    private $service;
    private $statusQueueRepository;

    public function __construct(
        $id,
        $module,
        StatusQueueService $service,
        StatusQueueRepository $statusQueueRepository,
        $config = []
    )
    {
        $this->service = $service;
        $this->statusQueueRepository = $statusQueueRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $statusQueue = $this->statusQueueRepository->findOne();

        return $this->render('index', compact('statusQueue'));
    }

    public function actionCreate()
    {
        $statusQueueForm = Yii::createObject(StatusQueueForm::class);
        $statusQueueForm->generateDummyData();

        if ($statusQueueForm->validate()) {
            try {
                $this->service->create($statusQueueForm);
                Yii::$app->session->setFlash('success', 'Запись создана');
                return $this->redirect(Yii::$app->request->referrer);
            } catch (DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete()
    {
        try {
            $this->service->clear();
            Yii::$app->session->setFlash('success', 'Таблица очищена');
        } catch (RuntimeException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }
}
