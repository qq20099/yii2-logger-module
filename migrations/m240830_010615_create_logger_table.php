<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%loggger}}`.
 */
class m240830_010615_create_logger_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%logger}}', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%logger}}');
    }
}
