<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class MonthlyExpense extends Eloquent
{
    protected $connection = 'mongodb';

    // Define the fillable attributes
    protected $fillable = [
        'amount',
        'description',
        'month',
        'year',
        'category',
        'user_id',  // assuming there's a user associated with the expense
    ];

    // Define hidden attributes if needed
    protected $hidden = [
        // list any attributes you want to hide, e.g. 'user_id'
    ];

    // Define relationships if needed, for example with User:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
