<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','company_name','company_description','company_logo','company_email','contact_name','phone','city','website'];

    public function Job()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
    
}
