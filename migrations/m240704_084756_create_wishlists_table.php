<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wishlists}}`.
 */
class m240704_084756_create_wishlists_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wishlists}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-wishlists-user_id',
            '{{%wishlists}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-wishlists-user_id', '{{%wishlists}}');
        $this->dropTable('{{%wishlists}}');
    }
}
