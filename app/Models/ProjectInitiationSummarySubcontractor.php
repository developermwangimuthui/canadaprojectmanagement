<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInitiationSummarySubcontractor extends Model
{

    use UsesUUID;
    use HasFactory ,SoftDeletes;
    public function project(){
        $this->belongsTo(Project::class);
    }
}
