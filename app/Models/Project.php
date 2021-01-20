<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use UsesUUID;
    use HasFactory;
    protected $fillable = [

        'name',
        'reference_number',
        'project_sponsor',
        'pursuit_lead',
        'date',

    ];
}
