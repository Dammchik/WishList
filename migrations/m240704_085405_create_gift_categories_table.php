<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gift_categories}}`.
 */
class m240704_085405_create_gift_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gift_categories}}', [
            'gift_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'PRIMARY KEY(gift_id, category_id)',
        ]);

        $this->addForeignKey(
            'fk-gift_categories-gift_id',
            '{{%gift_categories}}',
            'gift_id',
            '{{%gifts}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-gift_categories-category_id',
            '{{%gift_categories}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-gift_categories-gift_id', '{{%gift_categories}}');
        $this->dropForeignKey('fk-gift_categories-category_id', '{{%gift_categories}}');
        $this->dropTable('{{%gift_categories}}');
    }
}
