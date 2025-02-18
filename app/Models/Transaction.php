<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'address',
        'phone_number',
        'country',
        'city',
        'cardName',
        'cardNumber'.
        'PostalCode',
    ];

    public $timestamps = false;

    public function details(){
        return $this->hasMany(Transaction_detail::class, 'transaction_id');
    }
    
}
