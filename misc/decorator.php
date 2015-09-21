<?php

class Document {0
  public $elements = array();
 
  public function __construct() {
 
  }
 
  public function addHeading($title) {
    $this->elements[] = $title;
  }

  public function addText($text) {
    $this->elements[] = $text;
  }
 
  public function getDocument() {
    return $this->elements;
  }
}
 
class DocumentDecorator {
  public $entries;
 
  public function __construct(Blog $blog) {
    $this->entries = $blog->getEntryList();
  }
 
  public function makeIndexNumber() {
    foreach ($this->entries as $index => $title) {
      $this->entries[$index] = ($index + 1) . '. '. $title;
    }
    return $this->entries;
  }
 
  public function makeCaps() {
    foreach ($this->entries as $index => $title) {
      $this->entries[$index] = strtoupper($title);
    }
    return $this->entries;
  }
}
 
$blog = new Blog();

$blog->addEntry('Hello world!');
$blog->addEntry('Good morning.');
$blog->addEntry('How are you!');
 
$decorator = new BlogDecorator($blog);
$entries = $decorator->makeIndexNumber();
 
echo '<pre>';
print_r($entries);
echo '</pre>';
 
/**
 * Output:
 *
Array
(
  [0] => 1. Hello world!
  [1] => 2. Good morning.
  [2] => 3. How are you!
)
 */
 
$decorator = new BlogDecorator($blog);
$entries = $decorator->makeCaps();
 
echo '<pre>';
print_r($entries);
echo '</pre>';
 
/**
 * Output:
 *
Array
(
  [0] => HELLO WORLD!
  [1] => GOOD MORNING.
  [2] => HOW ARE YOU!
)
 */
 
?>