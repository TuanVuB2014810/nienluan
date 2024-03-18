<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'major_id','account_id', 'sex','birthday', 'course'];
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
                $model->id = 'B' . str_pad($newNumber, strlen($lastNumber), '0', STR_PAD_LEFT);
            } else {
                // Nếu bảng trống, bắt đầu từ id này
                $model->id = 'B0000001';
            }
        });
    }
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
    public function account()
    {
        return $this->belongsTo(account::class, 'account_id', 'id');
    }
}
