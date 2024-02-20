<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    use HasFactory;

    protected $table = 'technologies';
    public function projects(){
        return $this->belongsToMany(Project::class)->withTimestamps();
    }
}
