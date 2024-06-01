<?php 

namespace App\Services;

use App\Models\Collection;

class CollectionService{

    public function get_all_collections($iso){

        $collections_string = file_get_contents(dirname(__DIR__)."/Data/Collections.json");

        if(!$collections_string){
            return [];
        }

        $collections_array = json_decode($collections_string, true);

        $filtered_collections = array_filter($collections_array, function($collection) use($iso){
            return $collection["iso"] == $iso;
        });

        $collection_objects = array();

        for($i=0;$i<count($filtered_collections);$i++){
            $collection_objects[] = new Collection(
                $filtered_collections[$i]["title"], 
                $filtered_collections[$i]["description"],
                $filtered_collections[$i]["grade"],
                $filtered_collections[$i]["iso"]
            );
        }
        return $collection_objects;
    }
}
?>