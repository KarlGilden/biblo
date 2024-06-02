<?php 

namespace App\Models\Dtos;

class LibraryLessonDto {

    public $id;
    public $title;
    public $iso;
    public $collectionId;

    public function __construct($id, $title, $iso, $collectionId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->iso = $iso;
        $this->collectionId = $collectionId;
    }

}
?>