<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Job extends Model
{
    use HasFactory;
    public function getRouteKeyName(){
        return 'slug';
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
