<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Image;

class UsersController extends Controller {

  public function personalPage($userEmail) {
    $userEmail = $userEmail . "@gmail.com";
    
    $user = User::where("email", $userEmail)->first();
    

    if (!$user) {
      $this->notFound();
    }

    $data = [
      'user' => $user
    ];

    echo $this->view->render("homes/personalpage", $data);
  }
  
  public function edit($userId) {

    if (!$_SESSION['admin']) {
      header("location: /");
    }

    $user = User::find($userId);

    if (!$user) {
      $_SESSION['message'] = "User is not exists.";
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location: /admin");
    }
    
    $data = [
      'user' => $user
    ];

    echo $this->view->render("admins/edit", $data);
  }

  public function update($userId) {

    if (!$_SESSION['admin']) {
      header("location: /");
    }

    $user = User::find($userId);

    if (!$user) {
      $_SESSION['message'] = "User is not exists.";
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location: /admin");
    }

    $data = $this->getUserData();

    $user->fill($data)->save();
    $_SESSION['message'] = "User information updated!";
    $_SESSION['msg_type'] = "alert alert-success";
    header("location: /admin");

  }

  public function delete($userId) {

    if (!$_SESSION['admin']) {
      header("location: /");
    }

    $user = User::find($userId);

    if (!$user) {
      $_SESSION['message'] = "User is not exists.";
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location: /admin");
    }

    $user->delete();
    $_SESSION['message'] = "User deleted!";
    $_SESSION['msg_type'] = "alert alert-success";
    header("location: /admin");
  }

  public function search() {
    $search = addslashes($_POST['search']);
    $search = trim($search);

    if (empty($search)) {
      $data = [
        'users' => User::where('is_admin', 0)->get(),
        // 'images' => Image::get()
      ];
      echo $this->view->render("/homes/search", $data);
    }

    else { 
      $data = [
        'users' => User::where('name', 'like', '%' .$search . "%")->orWhere('hobby', 'like', '%' .$search . "%")->orWhere('gender', $search)->get(),
        // 'images' => Image::get()
      ];
      echo $this->view->render("/homes/search", $data);
    }
  }

  protected function getUserData() {
    return [
      'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
      'name' => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
      'gender' => filter_var($_POST['gender'], FILTER_SANITIZE_STRING),
      'dob' => $_POST['dob'],
      'hobby' => filter_var($_POST['hobby'], FILTER_SANITIZE_STRING),
      'biography' => filter_var($_POST['biography'], FILTER_SANITIZE_STRING)
    ];
  }

}