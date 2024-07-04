<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gifts}}`.
 */
class m240704_085027_create_gifts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gifts}}', [
            'id' => $this->primaryKey(),
            'wishlist_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'image_url' => $this->string(255),
            'link' => $this->string(255),
        ]);

        $this->addForeignKey(
            'fk-gifts-wishlist_id',
            '{{%gifts}}',
            'wishlist_id',
            '{{%wishlists}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-gifts-wishlist_id', '{{%gifts}}');
        $this->dropTable('{{%gifts}}');
    }
}
