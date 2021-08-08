<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['CodePrsn','CountUnit','Email','Telephone','PhoneNumber','Address','ProjectMasterCode','ProjectAdvisorCode',
                             'Title','ProjectType','Proposed','GroupMember','Summary','Equipment','HowDoJob','status','Message'];

    public function Student()
    {
        return $this->hasOne(User::class,'CodePrsn','CodePrsn');
    }
    public function Master()
    {
        return $this->hasOne(User::class,'CodePrsn','ProjectMasterCode');
    }
    public function Advisor()
    {
        return $this->hasOne(User::class,'CodePrsn','ProjectAdvisorCode');
    }
}
