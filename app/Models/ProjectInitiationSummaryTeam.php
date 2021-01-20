<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInitiationSummaryTeam extends Model
{
    use HasFactory ,SoftDeletes;
    public function project(){
        $this->belongsTo(Project::class);
    }
    use UsesUUID;
}
