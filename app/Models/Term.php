<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    public $incrementing=false;
    public $timestamps=false;
    protected $fillable=['CodeTrm','NameTrm'];
    public function WeekSh()
    {
        return $this->hasMany(WeekSh::class,'term','CodeTrm');
    }
}
