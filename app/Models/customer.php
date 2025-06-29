<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = ['name','email','phone','dob','addate','gender'];   

    protected $table = "customers";

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
