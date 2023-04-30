<?php

namespace App\Controllers;
use App\Core\App;

class ViewController
{
    public function home()
    {
        check_auth();
        

        return view('index',compact('images'));
    }

    public function viewImages()
    {
        check_auth();

        if(!isset($_GET['page'])){
            $_GET['page'] = 1;
        }
        $pageNum = $_GET['page'];


        

        $images = App::get('database')->selectAll('images');

        $totalImgCount = sizeof($images);

        if(sizeof($images) > 10){
            $offset = ($pageNum - 1) * 10;
            $images = App::get('database')->selectFew('images',10,$offset);
        }

        $lastImage = App::get('database')->selectLast('images');




        return view('viewImages',compact('images','totalImgCount','lastImage'));
    }

    public function viewAddImage()
    {
        check_auth();
        return view('addImage');
    }

    public function viewEditImage()
    {
        check_auth();

        if(!isset($_GET['id'])){
            echo "Please insert id";
        }

        $id = $_GET['id'];



        $image = App::get('database')->selectOne('images',$id);

        return view('editImage',compact('image'));


    }

    public function viewAddTag()
    {
        check_auth();
        return view('addTag');
    }

    public function viewTags()
    {
        check_auth();
        if(!isset($_GET['page'])){
            $_GET['page'] = 1;
        }
        $pageNum = $_GET['page'];


        

        $tags = App::get('database')->selectAll('tags');

        $totalTagCount = sizeof($tags);

        if(sizeof($tags) > 10){
            $offset = ($pageNum - 1) * 10;
            $tags = App::get('database')->selectFew('tags',10,$offset);
        }

        $lastTag = App::get('database')->selectLast('tags');

        




        return view('viewTags',compact('tags','totalTagCount','lastTag'));
    }

    public function viewEditTag()
    {
        check_auth();
        if(!isset($_GET['id'])){
            echo "Please insert id";
        }

        $id = $_GET['id'];



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
        
        $availableImages = array_filter($imagesInTag, function($image) use ($selectedTag){
            if(isset($image->tags)){
                foreach ($image->tags as $tag){
                    $currentID = $selectedTag->id;
                    if($tag->id == $currentID){
                        return false;
                    }
                }
            }
            return true;
        });

        

        return view('editTag',compact('selectedTag','images','imagesInTag','newImages','availableImages'));
    }

    public function viewRegister()
    {
        check_auth();

        $users = App::get('database')->selectAll('users');

        return view('register',compact('users'));
    }

    public function viewLogin()
    {
        /**
         * redirect user to '/' if they are logged in. Otherwise, return view for login
         */
        if(isset($_SESSION['user'])){
            return redirect('/');
        }
        return view('login');
    }


}