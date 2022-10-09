<?php

namespace app\modules\status\models;

use yii\db\ActiveRecord;

/**
 * @property int $id [int(11)]
 * @property string $c_id [varchar(32)]
 * @property string $s_name [varchar(512)]
 * @property string $c_name [varchar(512)]
 * @property string $a_type [varchar(128)]
 * @property string $direction [varchar(32)]
 * @property string $activation [varchar(32)]
 * @property string $c_state [varchar(32)]
 * @property string $control [varchar(32)]
 */
class Status extends ActiveRecord
{

    const TYPE_ONE = 'one';
    const TYPE_TWO = 'two';
    const TYPE_THREE = 'three';

    public static function tableName()
    {
        return 'statuses';
    }

    public static function create($c_id, $s_name, $c_name, $a_type, $direction, $activation, $c_state, $control): self
    {
        $self = new self();
        $self->c_id = $c_id;
        $self->s_name = $s_name;
        $self->c_name = $c_name;
        $self->a_type = $a_type;
        $self->direction = $direction;
        $self->activation = $activation;
        $self->c_state = $c_state;
        $self->control = $control;
        return $self;
    }

    public function edit($c_id, $s_name, $c_name, $a_type, $direction, $activation, $c_state, $control): void
    {
        $this->c_id = $c_id;
        $this->s_name = $s_name;
        $this->c_name = $c_name;
        $this->a_type = $a_type;
        $this->direction = $direction;
        $this->activation = $activation;
        $this->c_state = $c_state;
        $this->control = $control;
    }

    public function rules()
    {
        return [
            [['c_id', 's_name', 'c_name', 'a_type', 'direction', 'activation', 'c_state', 'control'], 'string'],
        ];
    }

}