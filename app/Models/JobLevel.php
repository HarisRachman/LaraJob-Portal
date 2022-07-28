<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    use HasFactory;

    protected $table = 'job_levels';

    protected $primaryKey = 'id';

    protected $fillable = ['job_level_name'];

    public function Job()
    {
        return $this->hasMany(Job::class, 'joblevel_id');
    }
}
