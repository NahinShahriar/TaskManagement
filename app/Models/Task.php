<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
     protected $primaryKey = 'task_id';

   public $timestamps = true;
    protected $fillable=[
       'title',
       'description',
       'status',
       'due_date',
       'status_active',

    ];
     protected $dates = ['created_at', 'updated_at'];

    // public function scopeActive($query)
    // {
    //     return $query->where('status_active',1);
    // }
}
