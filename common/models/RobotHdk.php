<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dh_robot_dataoke".
 *
 * @property string $id
 * @property string $title 采集名称
 * @property int $from_cid 来源分类
 * @property int $to_cid 入库分类
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class RobotHdk extends ActiveRecord
{
    const FROM_CATEGORY = [
        1 => '女装',
        2 => '男装',
        3 => '内衣',
        4 => '美妆',
        5 => '配饰',
        6 => '鞋品',
        7 => '箱包',
        8 => '儿童',
        9 => '母婴',
        10 => '居家',
        11 => '美食',
        12 => '数码',
        13 => '家电',
        14 => '其他',
        15 => '车品',
        16 => '文体',
    ];

    public static function map()
    {
        $model = self::find()->select(['from_cid', 'to_cid'])->asArray()->all();
        return ArrayHelper::map($model, 'from_cid', 'to_cid');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'from_cid', 'to_cid'], 'required'],
            [['from_cid', 'to_cid', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '采集名称',
            'from_cid' => '采集ID',
            'to_cid' => '入库ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }
}
