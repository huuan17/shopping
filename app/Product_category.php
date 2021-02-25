<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_category extends Model
{
    use SoftDeletes;
    protected $fillable=['name_vie','parent_id','slug','introduction_vie','home_page','order','title','description','keyword','active'];
}
