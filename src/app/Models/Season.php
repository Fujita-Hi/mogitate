<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = [
        'name',
    ];

    public static $rules = array(
        'name' => 'required',
    );

    public function products(){
        return $this->belongsToMany(Product::class, 'product_season');
    }
}
