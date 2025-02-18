<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_image',
        'item_name',
        'item_category',
        'item_price',
        'bdesc',
        'desc',
    ];
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
