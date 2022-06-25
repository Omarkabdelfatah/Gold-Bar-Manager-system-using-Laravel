<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $table = "weight";
    protected $primaryKey = "id";
    protected $fillable =["measure_unit"];
     /**
     * Get the bars for the weight.
     */
    public function bars_weight()
    {
        return $this->hasMany('App\Bar', 'foreign_key');
    }
}
