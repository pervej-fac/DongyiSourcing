<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'amount',
        'type',
        'date',
        'created_by',
        'updated_by'
    ];


    public function getCreatedAtAttribute($date)
    {
        return date('j-M-Y', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('j-M-Y', strtotime($date));
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class,'updated_by', 'id');
    }


}


