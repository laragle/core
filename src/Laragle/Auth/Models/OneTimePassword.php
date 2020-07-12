<?php

namespace Laragle\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class OneTimePassword extends Model
{   
    /**
     * The attributes that are not mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the owning otpable model.
     */
    public function otpable()
    {
        return $this->morphTo();
    }
}