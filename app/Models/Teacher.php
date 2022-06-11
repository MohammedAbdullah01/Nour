<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['grade_id','last_name','first_name','email','numtel','department','status','state','password'];


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
