<?php

use yii\db\Migration;

/**
 * Class m221009_181812_statuses
 */
class m221009_181812_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('statuses', [
            'id' => $this->primaryKey(),
            'c_id' => $this->string(32),
            's_name' => $this->string(512),
            'c_name' => $this->string(512),
            'a_type' => $this->string(128),
            'direction' => $this->string(32),
            'activation' => $this->string(32),
            'c_state' => $this->string(32),
            'control' => $this->string(32),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('statuses');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221009_181812_statuses cannot be reverted.\n";

        return false;
    }
    */
}
