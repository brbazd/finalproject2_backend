<?php

namespace App\Controllers;
use App\Core\App;

class AuthController
{

    public function register()
    {
        check_auth();

        if(empty($_POST['password']) || strlen($_POST['password']) < 5){
            return redirect('/register');
        }
        $pass = trim($_POST['password']);
        $hash = hash('sha256',$pass);


        // repeated password to check original
        if(!isset($_POST['repeatpassword'])){
            return redirect('/register');
        }
        $passRepeat = $_POST['repeatpassword'];
        $passRepeat = trim($passRepeat);
        $repeatHash = hash('sha256',$passRepeat);

        if($hash != $repeatHash){
            return redirect('/register');
        }

        // name validation
        if(!isset($_POST['username'])){
            return redirect('/register');
        }

        $username = trim($_POST['username']);

        if(strlen($username) < 3){
            return redirect('/register');
        }

        // email validation and sanitization
        if(!isset($_POST['email'])){
            return redirect('/register');
        }

        $email = trim($_POST['email']);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return redirect('/register');
        }

        // data to submit
        $data = [
            'username'=>$username,
            'email'=>$email,
            'password'=>$hash
        ];

        App::get('database')->insert('users',$data);

        redirect('/register');
    }


    public function login()
    {
        // password check
        if(empty($_POST['password'])){
            redirect('/login');
        }
        $pass = trim($_POST['password']);
        $hash = hash('sha256',$pass);

        // email check
        if(!isset($_POST['email'])){
            return redirect('/login');
        }

        $email = trim($_POST['email']);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return redirect('/login');
        }

        $params = [
            'email'=>$email,
            'password'=>$hash
        ];

        $user = App::get('database')->selectOneByField('users',$params);

        if($user){
            $_SESSION['user'] = $user;
            unset($_SESSION['user']->password);
            return redirect("/");
        }

        return redirect('/login');
    }

    public function logout()
    {
        check_auth();
        unset($_SESSION['user']);
        return redirect('/login');
    }

    public function delete()
    {
        check_auth();

        $id = $_GET['id']; 


        $user = App::get('database')->selectOneByField('users',['id'=>$id]);
        if(!$user || $user->email === 'admin@admin.com'){
            return redirect('/register');
        }

        App::get('database')->delete('users',$id);

        redirect("/register");
    }

}