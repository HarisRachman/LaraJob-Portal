<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_types';

    protected $primaryKey = 'id';

    protected $fillable = ['type_name'];

    public function Job()
    {
        return $this->hasMany(Job::class, 'type_id');
    }
}
