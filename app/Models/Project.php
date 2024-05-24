<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        "Project_name",
        "Project_Manager",
        "description",
        "start_Date",
        "End_date",
        "status",
        "user_id",
    ];
    public function user(){
      return   $this->belongsTo(User::class);
    }
    public function bug(){
        return $this->hasMany(Bug::class);
    }
}
