<?php

namespace Laragle\Auth\Contracts;

interface CanResetPasswordContract
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset();

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token);

    /**
     * Get user's one time passwords.
     */
    public function otps();
}
