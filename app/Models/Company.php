<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;

    use UsesUUID;

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'location',
    ];
    public function projects(){
        return $this->hasMany(Project::class);
    }

}
