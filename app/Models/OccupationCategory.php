<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupationCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function post()
    {
        return $this->hasMany('App\Models\Post', 'occategory', 'id');
    }
}
