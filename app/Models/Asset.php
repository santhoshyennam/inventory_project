<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'asset';
    protected $fillable = [
        'name',
        'description',
        'value',
        'purchased'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
