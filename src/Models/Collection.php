<?php 

namespace App\Models;

class Collection {

    public $title;
    public $description;
    public $grade;
    public $lessons;

    public function __construct($title, $description, $grade, $iso)
    {
        $this->title = $title;
        $this->description = $description;
        $this->grade = $grade;
        $this->iso = $iso;
    }

}
?>