<?php 

namespace App\Services;

class CollectionService{

    public function get_all_collections($iso){
        $collections = file_get_contents(dirname(__DIR__)."/Data/Collections.json");
        if(!$collections){
            return [];
        }
        $collections_array = json_decode($collections, true);
        $filtered_collections = array_filter($collections_array, function($collection){
            if($collection["iso"] == $iso){
                return true;
            }
        });

        return $filtered_collections;
    }
}
?>