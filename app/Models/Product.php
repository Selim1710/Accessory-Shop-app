<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
    public function accessory(){
        return $this->hasMany(Accessory::class);
    }
    public function offer(){
        return $this->belongsTo(Offer::class);
    }

}
