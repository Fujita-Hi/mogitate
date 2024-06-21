<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSeason extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = [
        'product_id',
        'season_id'
    ];

    public static $rules = array(
        'product_id' => 'required',
        'season_id' => 'required',
    );

    public function product(){
        return $this->belongsTo('App\Models\Product', 'id', 'product_id');
    }

    public function season(){
        return $this->belongsTo('App\Models\Season', 'id', 'season_id');
    }
}
