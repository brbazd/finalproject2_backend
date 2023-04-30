<?php

namespace App\Controllers;
use App\Core\App;

class ApiController
{
    public function displayImagesFromTagBy12(){
        if(!isset($_GET['tag'])){
            echo "Please insert tag id";
        }

        $id = $_GET['tag'];

        if(!isset($_GET['offset']) || empty($_GET['offset'])){
            $_GET['offset'] = 0;
        }

        $offset = $_GET['offset'];



        $selectedTag = App::get('database')->selectOne('tags',$id);

        $images = App::get('database')->selectAll('images');

        $tags = App::get('database')->selectAll('tags');
        $tag_image = App::get('database')->selectAll('tags_images');




        $imagesNew = [];
        foreach($images as $image){
            $imagesNew[$image->id] = $image;
            $imagesNew[$image->id]->tags = [];
        }
        $imagesInTag = $imagesNew;


        $tagsNew = [];
        foreach($tags as $tag){
            $tagsNew[$tag->id] = $tag;
        }
        $tags = $tagsNew;

        foreach($tag_image as $row){
            $imagesInTag[$row->image_id]->tags[] = $tags[$row->tag_id];
        }

        $newImages = array_filter($imagesInTag, function($image) use ($selectedTag){
            if(isset($image->tags)){
                foreach ($image->tags as $tag){
                    $currentID = $selectedTag->id;
                    if($tag->id == $currentID){
                        return true;
                    }
                }
            }
            return false;
        });

        $displayedImages = array_slice($newImages,$offset,12);

        
        print_r(json_encode($displayedImages));


        return json_encode($displayedImages);

    }

    public function displayFirst3Tags()
    {
        $images = App::get('database')->selectAll('images');

        $tags = App::get('database')->selectAll('tags');
        $tag_image = App::get('database')->selectAll('tags_images');


        $threeTags = array_slice($tags,0,3);

        $imagesNew = [];
        foreach($images as $image){
            $imagesNew[$image->id] = $image;
            $imagesNew[$image->id]->tags = [];
        }
        $imagesInTag = $imagesNew;


        $tagsNew = [];
        foreach($tags as $tag){
            $tagsNew[$tag->id] = $tag;
        }
        $tags = $tagsNew;

        foreach($tag_image as $row){
            $imagesInTag[$row->image_id]->tags[] = $tags[$row->tag_id];
        }

        $newImages = array_filter($imagesInTag, function($image){
            if(isset($image->tags)){
                if($image->tags == null){
                    return false;
                }
                return true;

            }
            return false;
        });

    

        $imagesInTag = $newImages;



        // print_r($imagesInTag);
        
        $tagsWithImage = [];
        
        foreach($threeTags as $tag){
            foreach($imagesInTag as $image){
                foreach($image->tags as $imageTagId){
                    if($imageTagId->id == $tag->id){
                        $tag->image = $image->url;
                    }
                }
            }
        }
        
        
        print_r(json_encode($threeTags));
        return json_encode($threeTags);




    }

    public function displayTagsWithOneImage()
    {
        $images = App::get('database')->selectAll('images');

        $tags = App::get('database')->selectAll('tags');
        $tag_image = App::get('database')->selectAll('tags_images');


        $tags = array_slice($tags,0);

        $imagesNew = [];
        foreach($images as $image){
            $imagesNew[$image->id] = $image;
            $imagesNew[$image->id]->tags = [];
        }
        $imagesInTag = $imagesNew;


        $tagsNew = [];
        foreach($tags as $tag){
            $tagsNew[$tag->id] = $tag;
        }
        $tags = $tagsNew;

        foreach($tag_image as $row){
            $imagesInTag[$row->image_id]->tags[] = $tags[$row->tag_id];
        }

        $newImages = array_filter($imagesInTag, function($image){
            if(isset($image->tags)){
                if($image->tags == null){
                    return false;
                }
                return true;

            }
            return false;
        });

    

        $imagesInTag = $newImages;

        foreach($tags as $tag){
            foreach($imagesInTag as $image){
                foreach($image->tags as $imageTagId){
                    if($imageTagId->id == $tag->id){
                        $tag->image = $image->url;
                    }
                }
            }
        }

        $tags = array_values($tags);

        print_r(json_encode($tags));
    }
}