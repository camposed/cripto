<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wsite;

/**
 * WsiteSearch represents the model behind the search form about `app\models\Wsite`.
 */
class WsiteSearch extends Wsite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsite', 'idcategoria', 'idusuario'], 'integer'],
            [['url', 'nom_site', 'nom_user', 'pass_user', 'notas'], 'safe'],
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
        $query = Wsite::find();

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
            'idsite' => $this->idsite,
            'idcategoria' => $this->idcategoria,
            'idusuario' => $this->idusuario,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'nom_site', $this->nom_site])
            ->andFilterWhere(['like', 'nom_user', $this->nom_user])
            ->andFilterWhere(['like', 'pass_user', $this->pass_user])
            ->andFilterWhere(['like', 'notas', $this->notas]);

        return $dataProvider;
    }
}
