<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=['CodePrsn','CodeRank','BrcName','Telephone','PhoneNumber','Email','Address','Status'];

    public function User()
    {
        return $this->hasOne(User::class,'CodePrsn','CodePrsn');
    }
}
