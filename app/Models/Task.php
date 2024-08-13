<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify the table associated with the model (if different from the default "tasks")
    protected $table = 'tasks';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
