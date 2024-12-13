<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'from_date', 'to_date','vacancy_name', 'content','image','number_of_people_required'];

}
