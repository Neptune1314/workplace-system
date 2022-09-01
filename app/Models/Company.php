<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Company extends Model
{
    use HasFactory;
    public function getRouteKeyName(){
        return 'slug';
    }
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    protected $fillable = ['user_id', 'cname', 'slug', 'address', 'phone', 'website', 'logo', 'cover_photo', 'slogan', 'description'];
}
