<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dep_id'];

    public function cat(){
        return $this->belongsTo(Department::class, 'dep_id', 'id');
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'major_id', 'id');
    }
}
