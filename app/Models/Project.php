<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'reference_number',
        'project_sponsor',
        'pursuit_lead',
        'date',

    ];
}
