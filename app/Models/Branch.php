<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['school_id','name','logo_path'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

}
