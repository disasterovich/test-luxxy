<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string|null $fio ФИО
 * @property int|null $birth_year Год рождения
 *
 * @property AuthorBook[] $authorBooks
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth_year'], 'integer'],
            [['fio'], 'string', 'max' => 500],

			[['birth_year', 'fio'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'birth_year' => 'Year Of Birth',
        ];
    }

    /**
     * Gets query for [[AuthorBooks]].
     *
     * @return \yii\db\ActiveQuery|AuthorBookQuery
     */
    public function getAuthorBooks()
    {
        return $this->hasMany(AuthorBook::className(), ['author_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuthorQuery(get_called_class());
    }
}
