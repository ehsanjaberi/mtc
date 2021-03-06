<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    use HasFactory;
    public $primaryKey='id';
    protected $fillable = ['id','name'];
    public $timestamps=false;
}
