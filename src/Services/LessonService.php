<?php 

namespace App\Services;

use App\Models\Dtos\LibraryLessonDto;

class LessonService{

    public function get_all($iso){

        $lessons_string = file_get_contents(dirname(__DIR__)."/Data/Lessons.json");

        if(!$lessons_string){
            return [];
        }

        $lessons_array = json_decode($lessons_string, true);

        $filtered_lessons = array_filter($lessons_array, function($lesson) use($iso){
            return $lesson["iso"] == $iso;
        });

        $filtered_lessons = array_values(array_values($filtered_lessons)); // reset indexes

        $lesson_objects = array();

        for($i=0;$i<count($filtered_lessons);$i++){
            $lesson_objects[] = new LibraryLessonDto(
                $filtered_lessons[$i]["id"], 
                $filtered_lessons[$i]["title"], 
                $filtered_lessons[$i]["iso"],
                $filtered_lessons[$i]["collectionId"], 
            );
        }
        return $lesson_objects;
    }
}
?>