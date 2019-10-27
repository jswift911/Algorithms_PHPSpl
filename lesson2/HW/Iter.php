<?php

class Chapter {
	protected $title;
	protected $content;

	public function __construct($title, $content)
	{
		$this->title = $title;
		$this->content = $content;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

}


class Book implements IteratorAggregate {
	protected $title;
	protected $author;
	protected $chapters;

	/**
	 * Book constructor.
	 * @param $title
	 * @param $author
	 * @param $chapters
	 */
	public function __construct($title, $author)
	{
		$this->title = $title;
		$this->author = $author;
		$this->chapters = [];
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return mixed
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	function addChapter(Chapter $chapter) {
		$this->chapters[] = $chapter;
	}

	public function getIterator()
	{
		return new ArrayIterator($this -> chapters);
	}

}

$book = new Book("Книга про итераторы", "Иванов ИИ");
$book->addChapter(new Chapter("Глава 1", "Что такое итераторы"));
$book->addChapter(new Chapter("Глава 2", "Что такое сортировка"));
$book->addChapter(new Chapter("Глава 3", "Что такое О большая"));

echo "Все главы книги ".$book->getTitle().PHP_EOL;

foreach ($book as $chapter) {
	echo $chapter->getTitle().PHP_EOL;
}