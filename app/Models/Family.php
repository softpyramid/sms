<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = ['family_no','type','name','address','occupation','mobile','home_mobile','email','identity_id','country_id','city_id'];

    public function country(){
		return $this->belongsTo(Country::class);
	}

	public function city(){
		return $this->belongsTo(City::class);
	}

	public function identity(){
		return $this->belongsTo(Identity::class);
	}
}
