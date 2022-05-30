<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Elasticquent\ElasticquentTrait;

class Item extends Model
{
    use HasFactory;
    // use ElasticquentTrait;
    
    protected $fillable = ['title','description'];
    // protected $mappingProperties = array (
    //     'title' =>[
    //         'type'=>'text',
    //         'analyzer'=>"standard",
    //     ],
    //     'description' =>[
    //         'type'=>'text',
    //         'analyzer'=>"standard",
    //     ],
    // );


}
