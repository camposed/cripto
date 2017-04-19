<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Log;

/**
 * LogSearch represents the model behind the search form about `app\models\Log`.
 */
class LogSearch extends Log
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idlog', 'idusuario'], 'integer'],
            [['fecha', 'os', 'nombre_host', 'tipo_maquina', 'version', 'ip'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Log::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idlog' => $this->idlog,
            'idusuario' => $this->idusuario,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'os', $this->os])
            ->andFilterWhere(['like', 'nombre_host', $this->nombre_host])
            ->andFilterWhere(['like', 'tipo_maquina', $this->tipo_maquina])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
