<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['capacity','num','floor','roomtype_id','material_id'];



    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }



}
