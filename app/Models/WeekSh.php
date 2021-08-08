<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekSh extends Model
{
    use HasFactory;
    protected  $fillable=[
        'title','attachment','M','status','term'
    ];
    public function Term()
    {
        return $this->belongsTo(Term::class,'term','CodeTrm');
    }
}
