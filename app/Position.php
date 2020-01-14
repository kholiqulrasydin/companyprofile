<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';

    protected $fillable =[
        'name',
        'salary',
        'description'
    ];

    public $timestamps = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

}
