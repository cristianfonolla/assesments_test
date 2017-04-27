<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    protected $fillable = [
        'grade_id',
        'user_id',
        'item_id',
        'item_type',
        'note',
        'weight',
        'parent_grade',
    ];

    public function grade()
    {
        return $this->hasOne('App\Grade', 'grade_id');
    }
}


