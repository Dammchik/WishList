<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gifts".
 *
 * @property int $id
 * @property int $wishlist_id
 * @property string $name
 * @property string|null $description
 * @property string|null $image_url
 * @property string|null $link
 *
 * @property Categories[] $categories
 * @property GiftCategories[] $giftCategories
 * @property Wishlists $wishlist
 */
class Gift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gifts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wishlist_id', 'name'], 'required'],
            [['wishlist_id'], 'default', 'value' => null],
            [['wishlist_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'image_url', 'link'], 'string', 'max' => 255],
            [['wishlist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wishlists::class, 'targetAttribute' => ['wishlist_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wishlist_id' => 'Wishlists ID',
            'name' => 'Name',
            'description' => 'Description',
            'image_url' => 'Image Url',
            'link' => 'Link',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::class, ['id' => 'category_id'])->viaTable('gift_categories', ['gift_id' => 'id']);
    }

    /**
     * Gets query for [[GiftCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiftCategories()
    {
        return $this->hasMany(GiftCategories::class, ['gift_id' => 'id']);
    }

    /**
     * Gets query for [[Wishlists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWishlist()
    {
        return $this->hasOne(Wishlists::class, ['id' => 'wishlist_id']);
    }
}
