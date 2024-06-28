<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status',
        'description',
        'user-id',
        'project-id'
    ];
    public function user()
    {
        return $this ->belongsTo(User::class);
    }
    public function projects()
    {
        return $this ->belongsTo(Projects::class);
    }
}
