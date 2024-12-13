<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Application extends Model
{
    use HasFactory;


    protected $table = 'applications';
    protected $fillable = [
        'name',
        'vacancy_id',
        'email',
        'address',
        'phone_number',
        'citizenship_front_image',
        'citizenship_back_image',
        'cv_pdf',
        'transcript',
        'engineering_license_image',
        'status',
        'work_experience',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }

}



