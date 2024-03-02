<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\General;

/**
 * GeneralSearch represents the model behind the search form of `common\models\General`.
 */
class GeneralSearch extends General
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tonn', 'partners', 'workers', 'lang'], 'integer'],
            [['telegram', 'instagram', 'facebook', 'youtube', 'call_centre', 'tel', 'video', 'appstore', 'google_play', 'bot_name', 'bot_link', 'mail', 'address', 'hours', 'about_main', 'aim_main', 'about_about', 'aim_about', 'video_about'], 'safe'],
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
        $query = General::find();

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
            'tonn' => $this->tonn,
            'partners' => $this->partners,
            'workers' => $this->workers,
            'lang' => $this->lang,
        ]);

        $query->andFilterWhere(['like', 'telegram', $this->telegram])
            ->andFilterWhere(['like', 'instagram', $this->instagram])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'youtube', $this->youtube])
            ->andFilterWhere(['like', 'call_centre', $this->call_centre])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'appstore', $this->appstore])
            ->andFilterWhere(['like', 'google_play', $this->google_play])
            ->andFilterWhere(['like', 'bot_name', $this->bot_name])
            ->andFilterWhere(['like', 'bot_link', $this->bot_link])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'hours', $this->hours])
            ->andFilterWhere(['like', 'about_main', $this->about_main])
            ->andFilterWhere(['like', 'aim_main', $this->aim_main])
            ->andFilterWhere(['like', 'about_about', $this->about_about])
            ->andFilterWhere(['like', 'aim_about', $this->aim_about])
            ->andFilterWhere(['like', 'video_about', $this->video_about]);

        return $dataProvider;
    }
}
