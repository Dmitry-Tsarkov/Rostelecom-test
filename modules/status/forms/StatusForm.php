<?php

namespace app\modules\status\forms;

use app\modules\status\models\Status;
use yii\base\Model;

class StatusForm extends Model
{
    public $c_id;
    public $s_name;
    public $c_name;
    public $a_type;
    public $direction;
    public $activation;
    public $c_state;
    public $control;

    public function __construct(?Status $status = null, $config = [])
    {
        if (!empty($status)) {
            $this->c_id = $status->c_id;
            $this->s_name = $status->s_name;
            $this->c_name = $status->c_name;
            $this->a_type = $status->a_type;
            $this->direction = $status->direction;
            $this->activation = $status->activation;
            $this->c_state = $status->c_state;
            $this->control = $status->control;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['c_id', 's_name', 'c_name', 'a_type', 'direction', 'activation', 'c_state', 'control'], 'string'],
            [['c_id'], 'unique', 'targetAttribute' => 'c_id', 'targetClass' => Status::class, 'message' => 'Запись с таким c_id уже существует'],
            [['s_name'], 'unique', 'targetAttribute' => 's_name', 'targetClass' => Status::class, 'message' => 'Запись с таким s_name уже существует'],
            [['c_name'], 'unique', 'targetAttribute' => 'c_name', 'targetClass' => Status::class, 'message' => 'Запись с таким c_name уже существует'],
            [['direction'], 'unique', 'targetAttribute' => 'direction', 'targetClass' => Status::class, 'message' => 'Запись с таким direction уже существует'],
            [['activation'], 'unique', 'targetAttribute' => 'activation', 'targetClass' => Status::class, 'message' => 'Запись с таким activation уже существует'],
            [['c_state'], 'unique', 'targetAttribute' => 'c_state', 'targetClass' => Status::class, 'message' => 'Запись с таким c_state уже существует'],
            [['control'], 'unique', 'targetAttribute' => 'control', 'targetClass' => Status::class, 'message' => 'Запись с таким control уже существует'],
        ];
    }

    public function getTypesDropDown()
    {
        return [
            Status::TYPE_ONE,
            Status::TYPE_TWO,
            Status::TYPE_THREE,
        ];
    }
}