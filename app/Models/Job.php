<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'company_id', 'category_id', 'title', 'slug', 'description', 'role', 'position', 'address', 'type', 'status', 'last_date'];
    
    public function getRouteKeyName(){
        return 'slug';
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
