<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectParticipant extends Model
{
    use HasFactory ,SoftDeletes;    use UsesUUID;


    public function project(){
        $this->belongsTo(Project::class);
    }}
