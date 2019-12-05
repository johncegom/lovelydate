<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class User extends Model {
  protected $table = 'users';
  protected $fillable = ['is_admin', 'name', 'email', 'password', 'gender', 'dob', 'hobby', 'biography'];

  public function validate(array $data) {   
    if (! $data['email']) {
      $_SESSION['message'] = 'Email invalid ';
      $_SESSION['msg_type'] = 'alert alert-danger';
      header("location /register");
    } 
    
    elseif (static::where('email', $data['email'])->count() > 0) {
      $_SESSION['message'] = 'Email taken';
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location /register");
    }    

    if (strlen($data['password']) < 6) {
      $_SESSION['message']  = 'Password must be at least 6 characters.';
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location /register");
    } 
    elseif ($data['password'] != $data['password_confirmation']) {
      $_SESSION['message'] = 'Confirm password does not match ';
      $_SESSION['msg_type'] = "alert alert-danger";
      header("location /register");
      
    }

    return true;
  }

  public function images() {
    return $this->hasMany('App\Models\Image');
  }
   
}