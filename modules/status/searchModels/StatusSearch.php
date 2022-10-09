<?php

namespace app\modules\status\searchModels;

use app\modules\status\models\Status;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class StatusSearch extends Model
{
    public $c_id;
    public $s_name;
    public $c_name;
    public $a_type;
    public $direction;
    public $activation;
    public $c_state;
    public $control;

    public function rules()
    {
        return [
            [['c_id', 's_name', 'c_name', 'a_type', 'direction', 'activation', 'c_state', 'control'], 'string'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Status::find();

        if ($this->load($params) && $this->validate()) {
            $query->andFilterWhere(['like', 'c_id', $this->c_id]);
            $query->andFilterWhere(['like', 's_name',  $this->s_name]);
            $query->andFilterWhere(['like', 'c_name',  $this->c_name]);
            $query->andFilterWhere(['like', 'a_type',  $this->a_type]);
            $query->andFilterWhere(['like', 'direction',  $this->direction]);
            $query->andFilterWhere(['like', 'activation',  $this->activation]);
            $query->andFilterWhere(['like', 'c_state',  $this->c_state]);
            $query->andFilterWhere(['like', 'control',  $this->control]);
        }

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['c_id' => SORT_ASC]]
        ]);
    }
}