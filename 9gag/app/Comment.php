<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id', 'user_name', 'com_content', 'post_id', 'created_at', 'updated_at'];
    //Table name
    protected $table = 'comments';
    //primaryKey
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
