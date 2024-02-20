<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\TypeDetail;

class Type extends Model
{
    use HasFactory;

    public function projects(){
        $this->hasMany(Project::class);
    }

    public function typeDetail(){
        $this->hasOne(TypeDetail::class);
    }
}
