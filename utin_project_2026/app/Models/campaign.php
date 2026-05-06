<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'collected_donation',
        'deadline',
    ];
}
