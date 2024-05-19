<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bug extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "description",
        "type",
        "user_id"
        ];
        public function user(){
            return $this->belongsTo(User::class);
            }
}
