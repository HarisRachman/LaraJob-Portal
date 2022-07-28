<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $primaryKey = 'id';

    protected $fillable = ['company_id','type_id','joblevel_id','education','category','experience','work-time','job_location','job_description'];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function Category()
    {
        return $this->belongsTo(SubCategory::class, 'category_id');
    }

    public function JobLevel()
    {
        return $this->belongsTo(JobLevel::class, 'joblevel_id');
    }

    public function JobType()
    {
        return $this->belongsTo(JobType::class, 'type_id');
    }

}
