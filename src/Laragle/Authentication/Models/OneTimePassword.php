<?php

namespace Laragle\Authentication\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
     * Constant representing verify email action.
     *
     * @var string
     */
    const VERIFY_EMAIL = 'verifyemail';

    /**
     * Constant representing reset password action.
     *
     * @var string
     */
    const RESET_PASSWORD = 'resetpassword';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($otp) {
            $otp->token = rand(100000, 999999);
            $otp->created_at = new Carbon;
        });
    }

    /**
     * Get the owning otpable model.
     */
    public function otpable()
    {
        return $this->morphTo();
    }

    /**
     * Determine if the token has expired.
     *
     * @param  int $expires
     * @return bool
     */
    public function isExpired($expires = 60)
    {
        return Carbon::parse($this->created_at)->addSeconds($expires)->isPast();
    }
}
