<?php

namespace App\Controllers;
use App\Core\App;

class TagsController
{

    public function addTag()
    {
        check_auth();
        if(!isset($_POST['name'])){
            echo "Please add a name for your tag";
        }

        if(strlen($_POST['name']) < 3){
            echo "Name of tag must be at least 3 characters long";
        }

        $name = trim($_POST['name']);

        $params = [
            "name"=>$name
        ];

        App::get('database')->insert('tags',$params);

        redirect('/');
    }

    
    public function updateTag()
    {
        check_auth();
        $id = $_POST['id'];

        

        if(isset($_POST['name']) || $_POST['name'] != null){
            $name = trim($_POST['name']);
            $params1 = [
                "id"=>$id,
                "name"=>$name
            ];

            App::get('database')->update('tags',$params1);
        }

        if($_POST['imageToTag'] != null){
            $image_id = $_POST['imageToTag'];
            $params2 = [
                "tag_id"=>$id,
                "image_id"=>$image_id
            ];
            App::get('database')->insert('tags_images',$params2);
        }

        redirect("/edit/tag?id=$id");
    }

    

    public function deleteTag()
    {
        check_auth();

        if(!isset($_GET['id'])){
            echo 'failed to delete';
        }

        $id = $_GET['id'];

        App::get('database')->delete('tags',$id);

        redirect('/view/tags');
    }

    public function unlink() {
        check_auth();
        $imageId = $_GET['imageid'];
        $tagId = $_GET['tagid'];

        App::get('database')->deleteTwo('tags_images',$imageId,$tagId);

        redirect("/edit/tag?id=$tagId");
    }

}