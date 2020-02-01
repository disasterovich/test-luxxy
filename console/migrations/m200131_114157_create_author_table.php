<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m200131_114157_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey()->unsigned(),
			'fio' => $this->string(500)->comment('ФИО'),
			'birth_year' => $this->integer()->unsigned()->comment('Год рождения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
