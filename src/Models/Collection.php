<?php 

namespace App\Models;

class Collection {

    public $id;
    public $title;
    public $description;
    public $grade;
    public $lessons;

    public function __construct($id, $title, $description, $grade, $iso)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->grade = $grade;
        $this->iso = $iso;
    }

}
?>