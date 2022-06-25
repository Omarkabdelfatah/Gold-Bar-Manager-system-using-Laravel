<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Safe extends Model
{
    protected $table = "safe";
    protected $primaryKey = "id";
    protected $fillable =["type","country_id","name"];
     /**
     * Get the bars for the safe.
     */
    public function bars()
    {
        return $this->hasMany('App\Bar');
    }
     /**
     * Get the country that owns the safe.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
