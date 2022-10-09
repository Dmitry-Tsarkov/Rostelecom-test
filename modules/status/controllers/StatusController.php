<?php

namespace app\modules\status\controllers;

use app\modules\status\forms\StatusForm;
use app\modules\status\repositories\StatusRepository;
use app\modules\status\searchModels\StatusSearch;
use app\modules\status\services\StatusService;
use DomainException;
use RuntimeException;
use Yii;
use yii\web\Controller;

class StatusController extends Controller
{
    private $service;
    private $statusRepository;

    public function __construct($id, $module, StatusService $service, StatusRepository $statusRepository, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->statusRepository = $statusRepository;
    }

    public function actionIndex()
    {
        $searchModel = new StatusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', compact('dataProvider', 'searchModel'));
    }

    public function actionCreate()
    {
        $statusForm = Yii::createObject(StatusForm::class);

        if ($statusForm->load(Yii::$app->request->post()) && $statusForm->validate()) {
            try {
                $status = $this->service->create($statusForm);
                Yii::$app->session->setFlash('success', 'Запись создана');
                return $this->redirect(['index']);
            } catch (DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('create', compact('statusForm'));
    }

    public function actionDelete($id)
    {
        try {
            $this->service->delete($id);
        } catch (RuntimeException $e) {
            Yii::$app->errorHandler->logException($e);
        }
        return $this->redirect(['index']);
    }
}