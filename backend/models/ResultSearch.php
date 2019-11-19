<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Result;

/**
 * ResultSearch represents the model behind the search form of `backend\models\Result`.
 */
class ResultSearch extends Result
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id'], 'integer'],
            [['q_1', 'q_2', 'q_3', 'q_4', 'q_5', 'q_6', 'q_7', 'q_8', 'q_9', 'q_10', 'q_11', 'q_12', 'q_13', 'q_14', 'q_15', 'q_16', 'q_17', 'q_18', 'q_19', 'q_20', 'q_21', 'q_22', 'q_23', 'q_24', 'q_25', 'q_26', 'q_27', 'q_28', 'q_29', 'q_30', 'q_31', 'q_32', 'q_33', 'q_34', 'q_35', 'q_36', 'q_37', 'q_38', 'q_39', 'q_40', 'q_41', 'q_42', 'q_43', 'q_44', 'q_45', 'q_46', 'q_47', 'q_48', 'q_49', 'q_50', 'q_51', 'q_52', 'q_53', 'q_54', 'q_55', 'q_56', 'q_57', 'q_58', 'q_59', 'q_60', 'q_61', 'q_62', 'q_63', 'q_64', 'q_65', 'q_66', 'q_67', 'q_68', 'q_69', 'q_70', 'q_71', 'q_72', 'q_73', 'q_74', 'q_75', 'q_76', 'q_77', 'q_78', 'q_79', 'q_80', 'q_81', 'q_82', 'q_83', 'q_84', 'q_85', 'q_86', 'q_87', 'q_88', 'q_89', 'q_90', 'q_91', 'q_92', 'q_93', 'q_94', 'q_95', 'q_96', 'q_97', 'q_98', 'q_99', 'q_100', 'q_101', 'q_102', 'q_103', 'q_104', 'q_105', 'q_106', 'q_107', 'q_108', 'q_109', 'q_110', 'q_111', 'q_112', 'q_113', 'q_114', 'q_115', 'q_116', 'q_117', 'q_118', 'q_119', 'q_120', 'q_121', 'q_122', 'q_123', 'q_124', 'q_125', 'q_126', 'q_127', 'q_128', 'q_129', 'q_130', 'q_131', 'q_132', 'q_133', 'q_134', 'q_135', 'q_136', 'q_137', 'q_138', 'q_139', 'q_140', 'q_141', 'q_142', 'q_143', 'q_144', 'q_145'], 'safe'],
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
        $query = Result::find();

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
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'q_1', $this->q_1])
            ->andFilterWhere(['like', 'q_2', $this->q_2])
            ->andFilterWhere(['like', 'q_3', $this->q_3])
            ->andFilterWhere(['like', 'q_4', $this->q_4])
            ->andFilterWhere(['like', 'q_5', $this->q_5])
            ->andFilterWhere(['like', 'q_6', $this->q_6])
            ->andFilterWhere(['like', 'q_7', $this->q_7])
            ->andFilterWhere(['like', 'q_8', $this->q_8])
            ->andFilterWhere(['like', 'q_9', $this->q_9])
            ->andFilterWhere(['like', 'q_10', $this->q_10])
            ->andFilterWhere(['like', 'q_11', $this->q_11])
            ->andFilterWhere(['like', 'q_12', $this->q_12])
            ->andFilterWhere(['like', 'q_13', $this->q_13])
            ->andFilterWhere(['like', 'q_14', $this->q_14])
            ->andFilterWhere(['like', 'q_15', $this->q_15])
            ->andFilterWhere(['like', 'q_16', $this->q_16])
            ->andFilterWhere(['like', 'q_17', $this->q_17])
            ->andFilterWhere(['like', 'q_18', $this->q_18])
            ->andFilterWhere(['like', 'q_19', $this->q_19])
            ->andFilterWhere(['like', 'q_20', $this->q_20])
            ->andFilterWhere(['like', 'q_21', $this->q_21])
            ->andFilterWhere(['like', 'q_22', $this->q_22])
            ->andFilterWhere(['like', 'q_23', $this->q_23])
            ->andFilterWhere(['like', 'q_24', $this->q_24])
            ->andFilterWhere(['like', 'q_25', $this->q_25])
            ->andFilterWhere(['like', 'q_26', $this->q_26])
            ->andFilterWhere(['like', 'q_27', $this->q_27])
            ->andFilterWhere(['like', 'q_28', $this->q_28])
            ->andFilterWhere(['like', 'q_29', $this->q_29])
            ->andFilterWhere(['like', 'q_30', $this->q_30])
            ->andFilterWhere(['like', 'q_31', $this->q_31])
            ->andFilterWhere(['like', 'q_32', $this->q_32])
            ->andFilterWhere(['like', 'q_33', $this->q_33])
            ->andFilterWhere(['like', 'q_34', $this->q_34])
            ->andFilterWhere(['like', 'q_35', $this->q_35])
            ->andFilterWhere(['like', 'q_36', $this->q_36])
            ->andFilterWhere(['like', 'q_37', $this->q_37])
            ->andFilterWhere(['like', 'q_38', $this->q_38])
            ->andFilterWhere(['like', 'q_39', $this->q_39])
            ->andFilterWhere(['like', 'q_40', $this->q_40])
            ->andFilterWhere(['like', 'q_41', $this->q_41])
            ->andFilterWhere(['like', 'q_42', $this->q_42])
            ->andFilterWhere(['like', 'q_43', $this->q_43])
            ->andFilterWhere(['like', 'q_44', $this->q_44])
            ->andFilterWhere(['like', 'q_45', $this->q_45])
            ->andFilterWhere(['like', 'q_46', $this->q_46])
            ->andFilterWhere(['like', 'q_47', $this->q_47])
            ->andFilterWhere(['like', 'q_48', $this->q_48])
            ->andFilterWhere(['like', 'q_49', $this->q_49])
            ->andFilterWhere(['like', 'q_50', $this->q_50])
            ->andFilterWhere(['like', 'q_51', $this->q_51])
            ->andFilterWhere(['like', 'q_52', $this->q_52])
            ->andFilterWhere(['like', 'q_53', $this->q_53])
            ->andFilterWhere(['like', 'q_54', $this->q_54])
            ->andFilterWhere(['like', 'q_55', $this->q_55])
            ->andFilterWhere(['like', 'q_56', $this->q_56])
            ->andFilterWhere(['like', 'q_57', $this->q_57])
            ->andFilterWhere(['like', 'q_58', $this->q_58])
            ->andFilterWhere(['like', 'q_59', $this->q_59])
            ->andFilterWhere(['like', 'q_60', $this->q_60])
            ->andFilterWhere(['like', 'q_61', $this->q_61])
            ->andFilterWhere(['like', 'q_62', $this->q_62])
            ->andFilterWhere(['like', 'q_63', $this->q_63])
            ->andFilterWhere(['like', 'q_64', $this->q_64])
            ->andFilterWhere(['like', 'q_65', $this->q_65])
            ->andFilterWhere(['like', 'q_66', $this->q_66])
            ->andFilterWhere(['like', 'q_67', $this->q_67])
            ->andFilterWhere(['like', 'q_68', $this->q_68])
            ->andFilterWhere(['like', 'q_69', $this->q_69])
            ->andFilterWhere(['like', 'q_70', $this->q_70])
            ->andFilterWhere(['like', 'q_71', $this->q_71])
            ->andFilterWhere(['like', 'q_72', $this->q_72])
            ->andFilterWhere(['like', 'q_73', $this->q_73])
            ->andFilterWhere(['like', 'q_74', $this->q_74])
            ->andFilterWhere(['like', 'q_75', $this->q_75])
            ->andFilterWhere(['like', 'q_76', $this->q_76])
            ->andFilterWhere(['like', 'q_77', $this->q_77])
            ->andFilterWhere(['like', 'q_78', $this->q_78])
            ->andFilterWhere(['like', 'q_79', $this->q_79])
            ->andFilterWhere(['like', 'q_80', $this->q_80])
            ->andFilterWhere(['like', 'q_81', $this->q_81])
            ->andFilterWhere(['like', 'q_82', $this->q_82])
            ->andFilterWhere(['like', 'q_83', $this->q_83])
            ->andFilterWhere(['like', 'q_84', $this->q_84])
            ->andFilterWhere(['like', 'q_85', $this->q_85])
            ->andFilterWhere(['like', 'q_86', $this->q_86])
            ->andFilterWhere(['like', 'q_87', $this->q_87])
            ->andFilterWhere(['like', 'q_88', $this->q_88])
            ->andFilterWhere(['like', 'q_89', $this->q_89])
            ->andFilterWhere(['like', 'q_90', $this->q_90])
            ->andFilterWhere(['like', 'q_91', $this->q_91])
            ->andFilterWhere(['like', 'q_92', $this->q_92])
            ->andFilterWhere(['like', 'q_93', $this->q_93])
            ->andFilterWhere(['like', 'q_94', $this->q_94])
            ->andFilterWhere(['like', 'q_95', $this->q_95])
            ->andFilterWhere(['like', 'q_96', $this->q_96])
            ->andFilterWhere(['like', 'q_97', $this->q_97])
            ->andFilterWhere(['like', 'q_98', $this->q_98])
            ->andFilterWhere(['like', 'q_99', $this->q_99])
            ->andFilterWhere(['like', 'q_100', $this->q_100])
            ->andFilterWhere(['like', 'q_101', $this->q_101])
            ->andFilterWhere(['like', 'q_102', $this->q_102])
            ->andFilterWhere(['like', 'q_103', $this->q_103])
            ->andFilterWhere(['like', 'q_104', $this->q_104])
            ->andFilterWhere(['like', 'q_105', $this->q_105])
            ->andFilterWhere(['like', 'q_106', $this->q_106])
            ->andFilterWhere(['like', 'q_107', $this->q_107])
            ->andFilterWhere(['like', 'q_108', $this->q_108])
            ->andFilterWhere(['like', 'q_109', $this->q_109])
            ->andFilterWhere(['like', 'q_110', $this->q_110])
            ->andFilterWhere(['like', 'q_111', $this->q_111])
            ->andFilterWhere(['like', 'q_112', $this->q_112])
            ->andFilterWhere(['like', 'q_113', $this->q_113])
            ->andFilterWhere(['like', 'q_114', $this->q_114])
            ->andFilterWhere(['like', 'q_115', $this->q_115])
            ->andFilterWhere(['like', 'q_116', $this->q_116])
            ->andFilterWhere(['like', 'q_117', $this->q_117])
            ->andFilterWhere(['like', 'q_118', $this->q_118])
            ->andFilterWhere(['like', 'q_119', $this->q_119])
            ->andFilterWhere(['like', 'q_120', $this->q_120])
            ->andFilterWhere(['like', 'q_121', $this->q_121])
            ->andFilterWhere(['like', 'q_122', $this->q_122])
            ->andFilterWhere(['like', 'q_123', $this->q_123])
            ->andFilterWhere(['like', 'q_124', $this->q_124])
            ->andFilterWhere(['like', 'q_125', $this->q_125])
            ->andFilterWhere(['like', 'q_126', $this->q_126])
            ->andFilterWhere(['like', 'q_127', $this->q_127])
            ->andFilterWhere(['like', 'q_128', $this->q_128])
            ->andFilterWhere(['like', 'q_129', $this->q_129])
            ->andFilterWhere(['like', 'q_130', $this->q_130])
            ->andFilterWhere(['like', 'q_131', $this->q_131])
            ->andFilterWhere(['like', 'q_132', $this->q_132])
            ->andFilterWhere(['like', 'q_133', $this->q_133])
            ->andFilterWhere(['like', 'q_134', $this->q_134])
            ->andFilterWhere(['like', 'q_135', $this->q_135])
            ->andFilterWhere(['like', 'q_136', $this->q_136])
            ->andFilterWhere(['like', 'q_137', $this->q_137])
            ->andFilterWhere(['like', 'q_138', $this->q_138])
            ->andFilterWhere(['like', 'q_139', $this->q_139])
            ->andFilterWhere(['like', 'q_140', $this->q_140])
            ->andFilterWhere(['like', 'q_141', $this->q_141])
            ->andFilterWhere(['like', 'q_142', $this->q_142])
            ->andFilterWhere(['like', 'q_143', $this->q_143])
            ->andFilterWhere(['like', 'q_144', $this->q_144])
            ->andFilterWhere(['like', 'q_145', $this->q_145]);

        return $dataProvider;
    }
}
