<?php

namespace App\Controllers;
use App\Core\App;

class ImagesController
{

    public function addImage()
    {
        check_auth();
        
        $target_dir = "uploads/";
        $file = $target_dir . basename(md5(time()).$_FILES['image']['name']);
        
        $check = getimagesize($_FILES['image']['tmp_name']);
        
        $fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        
        if($fileType !== 'jpg' && $fileType != 'jpeg' && $fileType != 'png'){
            echo "Error - unsupported format";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'],$file);
        }   
        
        $url = $file;
        
        if(!isset($_POST['title']) || !isset($_POST['description']) || $_FILES['image']['name'] == ""){
            echo "Please fill in all of the inputs";
        }


        /* $title = filter_input(INPUT_POST,$_POST['title'],FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,$_POST['description'],FILTER_SANITIZE_STRING); */

        $title = trim($_POST['title']);
        $description = trim($_POST['description']);



        $params = [
            'title'=>$title,
            'description'=>$description,
            'url'=>$url
        ];

        App::get('database')->insert('images',$params);

        redirect('/');

    }

    

    public function updateImage()
    {
        check_auth();
        $id = $_POST['id'];
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);

        $params = [
            'id'=>$id,
            'title'=>$title,
            'description'=>$description,
        ];

        if($_FILES['image']['name'] != ""){
            $target_dir = "uploads/";
            $file = $target_dir . basename(md5(time()).$_FILES['image']['name']);
        
            $check = getimagesize($_FILES['image']['tmp_name']);
        
            $fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        
            if($fileType !== 'jpg' && $fileType != 'jpeg' && $fileType != 'png'){
                echo "Error - unsupported format";
            } else {
                move_uploaded_file($_FILES['image']['tmp_name'],$file);
            }   
        
            $url = $file;

            $params['url'] = $url;
        }

        App::get('database')->update('images',$params);

        redirect("/edit/image?id=$id");
    }

    public function deleteImage()
    {
        check_auth();

        if(!isset($_GET['id'])){
            echo 'failed to delete';
        }

        $id = $_GET['id'];

        App::get('database')->delete('images',$id);

        redirect('/view/images');
    }

}