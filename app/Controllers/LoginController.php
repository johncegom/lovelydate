<?php

namespace App\Controllers;
use App\Models\User;

class LoginController extends Controller {
  public function showLogin() {

    if (isset($_SESSION['user_name'])) {
      header("location: /");
    }

    echo $this->view->render("homes/login");
  }

  protected function getUserCredentials() {
    return [
      'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
      'password' => $_POST['password']
    ];
  }

  public function login() {
    $userCredentials = $this->getUserCredentials();
    $errors =[];
    $user = User::where('email', $userCredentials['email'])->first(); // Tim trong database co email vua nhap khong, neu co tra ve thong tin

    if ($user === null) {
      // Nguoi dung khong ton tai
      $_SESSION['message'] = "This email is not registered.";
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location: /login");
    }
    elseif (password_verify($userCredentials['password'], $user->password)) {
      $_SESSION['user_name'] = $user->name;
      $_SESSION['gender'] = $user->gender;

      if ($user->is_admin === 1) {
        $_SESSION['admin'] = 1;
      }
      header("location: /");
    } 
    
    else {
      $_SESSION['message'] = 'Wrong password!';
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location: /login");
    }

    
  }

  public function logout() {
    session_unset();
    session_destroy();
    header("location: /");
  }
}