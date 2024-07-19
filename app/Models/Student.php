<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'birthdate', 'address'];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
