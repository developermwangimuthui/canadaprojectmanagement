<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class CrewDeploymentChecklist extends Model
{
    use HasFactory ,SoftDeletes;

    use UsesUUID;
    protected $table = 'crew_deployment_checklists';
    protected $fillable = [
        'project_id',
        'type',
        'dsqse',
        'na',
        'reviwed_and_discussed',
        'notes',
    ];
    public function project(){
        $this->belongsTo(Project::class);
    }
}
