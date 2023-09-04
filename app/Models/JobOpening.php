<?php

namespace App\Models;

use App\Models\User;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobOpening extends Model
{
    use HasFactory;

    protected $casts = ['last_day'=>'date'];

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

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function salary(){
        return $this->belongsTo(Salary::class);
    }

    public function applicant(){
        return $this->hasMany(Applicant::class)->orderBy('created-at', 'DESC');
    }

    public function recruiter(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
