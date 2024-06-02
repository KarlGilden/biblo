<?php 

namespace App\Services;

use App\Models\Dtos\LibraryLessonDto;
use App\Models\Lesson;

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


    public function get_single($iso, $id){
        $lessons_string = file_get_contents(dirname(__DIR__)."/Data/Lessons.json");

        if(!$lessons_string){
            return [];
        }

        $lessons_array = json_decode($lessons_string, true);

        $filtered_lessons = array_filter($lessons_array, function($lesson) use($iso, $id){
            return $lesson["iso"] == $iso && $lesson["id"] == $id;
        });

        $filtered_lessons = array_values(array_values($filtered_lessons)); // reset indexes

        $lesson = $filtered_lessons[0];

        $lesson_object = new Lesson(
            $lesson["id"],
            $lesson["title"],
            $lesson["story"],
            $lesson["grammarGuide"],
            $lesson["iso"],
            $lesson["collectionId"]
        );

        return [$lesson_object];
    }
}
?>