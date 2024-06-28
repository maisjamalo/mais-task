<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProjects extends Model
{
    use HasFactory;
    protected $fillable =[
        'status',
        'role',
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
