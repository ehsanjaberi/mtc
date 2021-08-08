<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccessLevel extends Model
{
    use HasFactory;
    protected $fillable=['Name','access_level_id'];
    public $timestamps=false;
//    public function User()
//    {
//        return $this->belongsTo(User::class,'PersonId','CodePrsn');
//    }
}
