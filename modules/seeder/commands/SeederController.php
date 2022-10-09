<?php

namespace app\modules\seeder\commands;

use app\modules\status\seeders\StatusSeeder;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class SeederController extends Controller
{
    public function actionSeed()
    {
        Yii::createObject(StatusSeeder::class)->seed(25); gc_collect_cycles();
    }

    public function actionRefresh()
    {
        $this->actionClearDb();
        Yii::$app->runAction('migrate', ['interactive' => 0]);
        $this->actionSeed();
        Console::stdout(PHP_EOL);
    }

    public function actionClearDb()
    {
        Yii::$app->getDb()->createCommand("SET foreign_key_checks = 0")->execute();
        foreach (Yii::$app->db->schema->tableNames as $tableName) {
            Yii::$app->getDb()->createCommand()->dropTable($tableName)->execute();
        }
        Yii::$app->getDb()->createCommand("SET foreign_key_checks = 1")->execute();
    }
}
