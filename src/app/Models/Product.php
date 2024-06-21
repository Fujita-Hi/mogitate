<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];

    public static $rules = array(
        'name' => 'required',
        'price' => 'required',
        'image' => 'required',
        'description' => 'required',
    );

    public function seasons(){
        return $this->belongsToMany(Season::class, 'product_season');
    }
}
