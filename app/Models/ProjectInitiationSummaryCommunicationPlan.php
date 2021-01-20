<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInitiationSummaryCommunicationPlan extends Model
{
    use HasFactory, SoftDeletes;
    use UsesUUID;
    protected $table ="project_i_summary_communication_plans";

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}
