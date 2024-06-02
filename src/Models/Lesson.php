<?php 

namespace App\Models\Dtos;

class Lesson {

    public $id;
    public $title;
    public $story;
    public $grammarGuide;
    public $iso;
    public $collectionId;

    public function __construct($id, $title, $story, $grammarGuide, $iso, $collectionId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->story = $story;
        $this->grammarGuide = $grammarGuide;
        $this->iso = $iso;
        $this->collectionId = $collectionId;
    }

}
?>