<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'birthday_date',
        'gender',
        'contact_number',
        'specialization',
    ];


    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

}
