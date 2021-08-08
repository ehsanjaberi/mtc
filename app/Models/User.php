<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey='CodePrsn';
    public $incrementing=false;
    protected $fillable = [
        'CodePrsn',
        'CodeNational',
        'Fname',
        'Lname',
        'CodeBrc',
        'CodeRank',
        'CodeJab',
        'CodeUni',
        'CodeSts',
        'CodeAccess',
        'username',
        'password',
        'created_at','updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    protected $keyType='char';
    public function Role()
    {
        return $this->belongsTo(UserAccessLevel::class,'CodeAccess','id');
//        return $this->belongsTo(UserAccessLevel::class,);
    }
//    public function Roles()
//    {
//        return $this->hasMany(UserAccessLevel::class,'PersonId','CodePrsn');
//    }
}
