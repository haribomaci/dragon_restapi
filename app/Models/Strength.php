<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dragon;

class Strength extends Model
{
    use HasFactory;
    protected $fillable = [
        "strength"
    ];

    public $timestamps = false;

    public function dragon(){
        return $this->hasMany(Dragon::class);
    }
}
