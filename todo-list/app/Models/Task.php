<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'type', 'description', 'due_date', 'priority',
        'location', 'reminder_at', 'is_urgent', 'notes'
    ];
}
