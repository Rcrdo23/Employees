<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    use HasFactory;

    protected $fillable = ['leader_id', 'member_id'];

    public function leader()
    {
        return $this->belongsTo(Employee::class, 'leader_id');
    }

    public function member()
    {
        return $this->belongsTo(Employee::class, 'member_id');
    }
}
