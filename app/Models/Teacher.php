<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'dep_id', 'email','birthday', 'sex', 'civil_servants', 'qualification'];

    public function getIdAttribute($value)
    {
        return  $value;
    }

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            $lastId = static::max('id');
            if ($lastId) {
                // Tách phần số từ ID
                $lastNumber = intval(substr($lastId, 1));
                // Tăng số lên một
                $newNumber = $lastNumber + 1;
                // Tạo ID mới với phần số được thêm vào 'b'
                $model->id = 'T' . str_pad($newNumber, strlen($lastNumber), '0', STR_PAD_LEFT);
            } else {
                // Nếu bảng trống, bắt đầu từ id này
                $model->id = 'T10001';
            }
        });
    }
    public function cat(){
        return $this->hasOne(Department::class, 'id', 'dep_id');
    }
    
}
