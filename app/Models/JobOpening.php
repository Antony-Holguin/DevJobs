<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'user_id',
        'company',
        'last_day',
        'description',
        'image',
        'is_posted'

    ];
}
