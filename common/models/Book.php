<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $name Название
 * @property int|null $number_of_page Количество страниц
 * @property int|null $release_year Дата выпуска
 *
 * @property AuthorBook[] $authorBooks
 */
class Book extends \yii\db\ActiveRecord
{
	/**
	 * @var array
	 */
	private $_authors;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'book';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			//[['authors'], 'each', 'rule' => ['integer']],
			[['authors'],'safe'],

			[['number_of_page', 'release_year'], 'integer'],
			['number_of_page', 'integer', 'min' => 1],

			[['name'], 'string', 'max' => 500],

			[['number_of_page', 'release_year', 'name'], 'required'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'number_of_page' => 'Number Of Page',
			'release_year' => 'Release Year',
		];
	}

	/**
	 * Gets query for [[AuthorBooks]].
	 *
	 * @return \yii\db\ActiveQuery|AuthorBookQuery
	 */
	public function getAuthorBooks()
	{
		return $this->hasMany(AuthorBook::className(), ['book_id' => 'id']);
	}

	/**
	 * {@inheritdoc}
	 * @return BookQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new BookQuery(get_called_class());
	}

	/**
	 * Get authors
	 */
	public function getAuthors()
	{
		if ($this->_authors === null) {
			$this->_authors = $this->getAuthorBooks()->select('author_id')->column();
		}

		return $this->_authors;
	}

	/**
	 * Set authors
	 * @param array $value
	 */
	public function setAuthors($value)
	{
		$this->_authors = (array)$value;
	}

	/**
	 * @param bool $insert
	 * @param array $changedAttributes
	 */
	public function afterSave($insert, $changedAttributes)
	{
		$this->updateAuthors();
		parent::afterSave($insert, $changedAttributes);
	}

	/**
	 * Update book authors
	 */
	private function updateAuthors()
	{
		$existingAuthors = $this->getAuthorBooks()->select('author_id')->column();
		$newAuthors = $this->getAuthors();

		$needLinkAuthors = array_diff($newAuthors,$existingAuthors);

		if ($needLinkAuthors) {
			foreach ($needLinkAuthors as $needLinkAuthorId) {
				$authorBook = new AuthorBook();
				$authorBook->author_id = (int)$needLinkAuthorId;
				$authorBook->book_id = $this->id;
				$authorBook->save();
			}
		}

		$needUnlinkAuthors = array_diff($existingAuthors,$newAuthors);

		if ($needUnlinkAuthors) {
			AuthorBook::deleteAll(['book_id' => $this->id, 'author_id' => $needUnlinkAuthors]);
		}
	}
}
