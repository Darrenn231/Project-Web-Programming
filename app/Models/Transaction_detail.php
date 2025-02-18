<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'food_id',
        'quantity',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
    
}
