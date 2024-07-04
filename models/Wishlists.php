<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wishlists".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 *
 * @property Gifts[] $gifts
 * @property Users $user
 */
class Wishlists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishlists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Gifts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGifts()
    {
        return $this->hasMany(Gifts::class, ['wishlist_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
