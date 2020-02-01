<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author_book}}`.
 */
class m200131_123555_create_author_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('{{%author_book}}', [
			'id' => $this->primaryKey()->unsigned(),
			'author_id' => $this->integer()->unsigned()->notNull(),
			'book_id' => $this->integer()->unsigned()->notNull(),
		]);

		$this->addForeignKey('fk_author_book_author_id', 'author_book', 'author_id', 'author', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_author_book_book_id', 'author_book', 'book_id', 'book', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author_book}}');
    }
}
