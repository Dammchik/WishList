<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gift;

/**
 * GiftSearch represents the model behind the search form of `app\models\Gift`.
 */
class GiftSearch extends Gift
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'wishlist_id'], 'integer'],
            [['name', 'description', 'image_url', 'link'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Gift::find();

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
            'id' => $this->id,
            'wishlist_id' => $this->wishlist_id,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'image_url', $this->image_url])
            ->andFilterWhere(['ilike', 'link', $this->link]);

        return $dataProvider;
    }
}
