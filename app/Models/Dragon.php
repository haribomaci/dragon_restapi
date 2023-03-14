<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Strength;

class Dragon extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "age",
        "strength_id"
    ];
    public $timestamps = false;

    public function strength(){
        return $this->belongsTo(Strength::class);
    }
}