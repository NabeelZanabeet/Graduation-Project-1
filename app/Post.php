<?php
// This is Posts Model
namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primarykey = 'id';
    public $timestamps = true;
    //This function impement a Realation (This post belong To a User)
    public function user(){
        return $this->belongsTo('App\User');
    }
}
