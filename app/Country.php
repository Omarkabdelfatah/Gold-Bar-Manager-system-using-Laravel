<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "country";
    protected $primaryKey = "id";
    protected $fillable =["name","longitude","latitude"];
     /**
     * Get the safes for the country.
     */
    public function safes()
    {
        return $this->hasMany('App\Safe');
    }

}
