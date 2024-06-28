<?php

abstract class Content
{
    protected $title;
    protected $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    abstract protected function display();

    public function getInfo()
    {
        return "Title: {$this->title}, Author: {$this->author}";
    }
}


// Concrete class for articles
class Article extends Content 
{
    private $content;
    public function __construct($title, $author, $content)
    {
        parent::__construct($title, $author);
        $this->content = $content;
    }

    public function display()
    {
        echo "Displaying article: {$this->title} by {$this->author}\n";
        echo $this->content . "\n"; 
    }
}


class Video extends Content
{
    private $duration;

    public function __construct($title, $author, $duration)
    {
        parent::__construct($title, $author);
        $this->duration = $duration;
    }

    public function display()
    {
        echo "Playing video: {$this->title} by {$this->author}, Duration: {$this->duration} seconds\n";
    }
}


class Image extends Content
{
    private $resolution;

    public function __construct($title, $author, $resolution)
    {
        parent::__construct($title, $author);
        $this->resolution = $resolution;
    }

    public function display() {
        echo "Displaying image: {$this->title} by {$this->author}, Resolution: {$this->resolution}\n";
    }

}


$article = new Article("PHP Abstract Class Example", "John Doe", "This is the content of the article.");
$video = new Video("Introduction to PHP", "Jane Smith", 120);
$image = new Image("Beautiful Sunset", "Alex Johnson", "1920x1080");


$article->display();
echo $article->getInfo() . "\n";
 
$video->display();
echo $video->getInfo() . "\n";
 
$image->display();
echo $image->getInfo() . "\n";


