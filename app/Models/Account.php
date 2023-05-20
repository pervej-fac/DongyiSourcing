<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'balance',
        'status',
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

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    } 
    
    public function created_by()
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class,'updated_by', 'id');
    }
}
