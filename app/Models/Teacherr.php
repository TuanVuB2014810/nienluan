<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacherr extends Model
{
    protected $fillable = ['id','name', 'dep_id'];

    public function getIdAttribute($value)
    {
        return  $value;
    }
    // Đảm bảo sử dụng hàm boot() để tự động tạo chuỗi ID
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
                $model->id = 'b' . str_pad($newNumber, strlen($lastNumber), '0', STR_PAD_LEFT);
            } else {
                // Nếu bảng trống, bắt đầu từ id này
                $model->id = 'b1200001';
            }
        });
    }

    // Định nghĩa quan hệ với bảng Department
    public function cat()
    {
        return $this->belongsTo(Department::class, 'dep_id');
    }
}
