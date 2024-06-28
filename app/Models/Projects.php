<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
    ];
    public function userproject()
    {
        return $this ->hasMany(UserProjects::class);
    }
    public function task()
    {
        return $this ->hasMany(Task::class);
    }
}
