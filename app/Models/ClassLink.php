<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLink extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=[
        'ERCode','LessonCode','LessonTitle','DayOfWeek','StartTime','EndTime','TeacherName','ClassLink'
    ];
    public $primaryKey='LessonCode';
}
