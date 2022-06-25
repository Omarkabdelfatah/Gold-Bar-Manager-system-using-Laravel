<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $table = "bar";
    protected $primaryKey = "id";
    protected $fillable =["name","type","measurement","weight_id","safe_id"];
    /**
     * Get the safe that owns the bar.
     */
    public function safe()
    {
        return $this->belongsTo(Safe::class);
    }
    /**
     * Get the weight that owns the bar.
     */
    public function weight()
    {
        return $this->belongsTo(Weight::class);
    }
}
