<?php

namespace app\modules\queueStatus\forms;

use app\modules\queueStatus\models\StatusQueue;
use Faker\Factory;
use yii\base\Model;

class StatusQueueForm extends Model
{
    public $c_id;
    public $s_name;
    public $c_name;
    public $a_type;
    public $direction;
    public $activation;
    public $c_state;
    public $control;

    private $faker;

    public function __construct($config = [])
    {
        $this->faker = Factory::create('ru_RU');
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['c_id', 's_name', 'c_name', 'a_type', 'direction', 'activation', 'c_state', 'control'], 'string']
        ];
    }

    public function generateDummyData()
    {
        $this->c_id = $this->faker->realText(10);
        $this->s_name = $this->faker->realText(10);
        $this->a_type = $this->faker->randomElement($this->getTypes());
        $this->c_name = $this->faker->realText(15);
        $this->direction = $this->faker->realText(20);
        $this->activation = $this->faker->realText(10);
        $this->c_state = $this->faker->realText(10);
        $this->control = $this->faker->realText(10);
    }

    private function getTypes()
    {
        return [
            StatusQueue::TYPE_ONE,
            StatusQueue::TYPE_TWO,
            StatusQueue::TYPE_THREE
        ];
    }
}
