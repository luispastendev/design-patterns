<?php
// class Page
// {
//     private $title;

//     private $body;

//     /**
//      * @var Author
//      */
//     private $author;

//     private $comments = [];

//     /**
//      * @var \DateTime
//      */
//     private $date;

//     // +100 private fields.

//     public function __construct(string $title, string $body, Author $author)
//     {
//         $this->title = $title;
//         $this->body = $body;
//         $this->author = $author;
//         $this->author->addToPage($this);
//         $this->date = new \DateTime();
//     }

//     public function addComment(string $comment): void
//     {
//         $this->comments[] = $comment;
//     }

//     public function getPages() : array{
//         return $this->author->getPages();
//     }

//     /**
//      * You can control what data you want to carry over to the cloned object.
//      *
//      * For instance, when a page is cloned:
//      * - It gets a new "Copy of ..." title.
//      * - The author of the page remains the same. Therefore we leave the
//      * reference to the existing object while adding the cloned page to the list
//      * of the author's pages.
//      * - We don't carry over the comments from the old page.
//      * - We also attach a new date object to the page.
//      */
//     public function __clone()
//     {
//         $this->title = "Copy of " . $this->title;
//         $this->author->addToPage($this);
//         $this->comments = [];
//         $this->date = new \DateTime();
//     }
// }

// class Author
// {
//     private $name;

//     /**
//      * @var Page[]
//      */
//     private $pages = [];

//     public function __construct(string $name)
//     {
//         $this->name = $name;
//     }

//     public function addToPage(Page $page): void
//     {
//         $this->pages[] = $page;
//     }

//     public function getPages(): array{
//         return $this->pages;
//     }
// }

// /**
//  * The client code.
//  */
// function clientCode()
// {
//     $author = new Author("John Smith");
//     $page = new Page("Tip of the day", "Keep calm and carry on.", $author);

//     // ...

//     $page->addComment("Nice tip, thanks!");

//     // ...

//     $draft = clone $page;
// }

// clientCode();


abstract class BookPrototype {
    protected $title;
    protected $topic;
    abstract function __clone();
    function getTitle() {
        return $this->title;
    }
    function setTitle($titleIn) {
        $this->title = $titleIn;
    }
    function getTopic() {
        return $this->topic;
    }
}

class PHPBookPrototype extends BookPrototype {
    function __construct() {
        $this->topic = 'PHP';
    }
    function __clone() {
    }
}

class SQLBookPrototype extends BookPrototype {
    function __construct() {
        $this->topic = 'SQL';
    }
    function __clone() {
    }
}
 
  writeln('BEGIN TESTING PROTOTYPE PATTERN');
  writeln('');

  $phpProto = new PHPBookPrototype();
  $sqlProto = new SQLBookPrototype();

  $book1 = clone $sqlProto;
  $book1->setTitle('SQL For Cats');
  writeln('Book 1 topic: '.$book1->getTopic());
  writeln('Book 1 title: '.$book1->getTitle());
  writeln('');

  $book2 = clone $phpProto;
  $book2->setTitle('OReilly Learning PHP 5');
  writeln('Book 2 topic: '.$book2->getTopic());
  writeln('Book 2 title: '.$book2->getTitle());
  writeln('');

  $book3 = clone $sqlProto;
  $book3->setTitle('OReilly Learning SQL');
  writeln('Book 3 topic: '.$book3->getTopic());
  writeln('Book 3 title: '.$book3->getTitle());
  writeln('');

  writeln('END TESTING PROTOTYPE PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>