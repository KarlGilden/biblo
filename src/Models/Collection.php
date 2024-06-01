<?php 

namespace App\Models;

class Collection {

    public $title;
    public $description;
    public $grade;
    public $lessons;

    public function __construct($title, $description, $grade)
    {
        $this->name = $name;
        $this->publishedYear = $publishedYear;
    }

}
?>