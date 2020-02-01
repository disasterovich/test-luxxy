<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m200131_115058_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
			'id' => $this->primaryKey()->unsigned(),
			'name' => $this->string(500)->comment('Название'),
			'number_of_page' => $this->smallInteger()->unsigned()->comment('Количество страниц'),
			'release_year' => $this->integer()->unsigned()->comment('Год выпуска'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
