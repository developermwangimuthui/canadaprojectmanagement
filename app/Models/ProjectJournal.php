<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class ProjectJournal extends Model
{
    use HasFactory ,SoftDeletes;
    public function project(){
        $this->belongsTo(Project::class);
    }
}
