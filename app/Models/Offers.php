<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','offer_percent','offer_buy','validity'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
