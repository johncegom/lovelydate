<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Image extends Model {
  protected $table = 'images';
  protected $fillable = ['user_id', 'img_url'];

  public function user() {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

}