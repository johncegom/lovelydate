<?php

namespace App\Controllers;


use App\Models\User;
use App\Models\Image;

class RegisterController extends Controller {
  public function showRegister() {

    if (isset($_SESSION['user_name'])) {
      header("location: /home");
    }

    echo $this->view->render("homes/register");
  }

  public function register() {
        // Đọc giá trị của form
    $data = $this->getUserData();
    $userEmail = User::where("email", $data['email'])->first();

    if ($userEmail === null) {
      $user = new User();
      if ($user->validate($data)) {
        $this->createUser($data);
        $_SESSION['message'] = "User has been created successfully.";
        $_SESSION['msg_type'] = "alert alert-success";
        header('location: /login');
      }
    }
    
    $_SESSION['message'] = "Email has been taken.";
    $_SESSION['msg_type'] = "alert alert-danger";
    header("location: /register");
  }
  protected function getUserData()
    {
        return [
            'name' => filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING),
            'email' => filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL),
            'password' => $_POST['password'],
            'password_confirmation' => $_POST['password_confirmation'],
            'gender' => $_POST['gender'],
            'dob' => $_POST['dob'],
            'hobby' => filter_var($_POST['hobby'], FILTER_SANITIZE_STRING),
            'biography' => filter_var($_POST['biography'], FILTER_SANITIZE_STRING),
            'img' => (ROOTDIR."public/img/users/".basename($_FILES['img']['name'])),
            'img_url' => ("/img/users/").basename($_FILES['img']['name'])
        ];
    }

  protected function createUser($data) {
  
    if (preg_match("!image!", $_FILES['img']['type'])){
      if (move_uploaded_file($_FILES['img']['tmp_name'], $data['img'])) {

        // $data1 = User::create([
        //   'is_admin' => 0,
        //   'name' => $data['name'],
        //   'email' => $data['email'],
        //   'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        //   'gender' => $data['gender'],
        //   'dob' => $data['dob'],
        //   'hobby' => $data['hobby'],
        //   'biography' => $data['biography'],    
        // ]);

        // Image::create([
        //     'user_id' => $data1->id,
        //     'img_url' => $data['img_url']
        // ]);


        $user = new User;
        $user->is_admin = 0;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->gender = $data['gender'];
        $user->dob = $data['dob'];
        $user->hobby = $data['hobby'];
        $user->biography = $data['biography'];
        $user->save();

        $image = new Image($data);
        $user->images()->save($image);
      }
    };
  
    return true;
  }
}