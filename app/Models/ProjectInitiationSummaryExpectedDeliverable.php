<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInitiationSummaryExpectedDeliverable extends Model
{

    use UsesUUID;
    use HasFactory ,SoftDeletes;
    protected $table = "project_i_summary_expected_deliverables";
    public function project(){
        $this->belongsTo(Project::class);
    }
}
