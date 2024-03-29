<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'notices' => [
        'verify-email' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.',
        'verification-link-sent' => 'A new verification link has been sent to the email address you provided during registration.',
        'confirm-password' => 'Please confirm your password before continuing.',
        'forgot-password' => 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
    ],

    'routes' => [
        'login' => 'Login',
        'register' => 'Register',
        'confirm-password' => 'Confirm Password',
        'forgot-password' => 'Forgot Password',
        'reset-password' => 'Reset Password',
        'verify-email' => 'Verify Email',
    ],

    'username' => [
        'label' => 'Username',
        'placeholder' => 'Please type your username',
        // 'description' => null,
    ],

    'email' => [
        'label' => 'Email',
        'placeholder' => 'E.g johndoe@example.com',
        // 'description' => null,
    ],

    'password' => [
        'label' => 'Password',
        'placeholder' => 'Please type your password',
        // 'description' => null,
    ],

    'new_password' => [
        'label' => 'New Password',
        'placeholder' => 'Please type your new password',
        // 'description' => null,
    ],

    'confirm_password' => [
        'label' => 'Confirm Password',
        'placeholder' => 'Please re-type your new password',
        // 'description' => null,
    ],

    'remember' => [
        'label' => 'Remember me',
    ],

    'actions' => [
        'forgot' => 'Forgot your password?',
        'registered' => 'Already registered?',
        'confirm' => 'Confirm',
        'login' => 'Log in',
        'register' => 'Register',
        'reset' => 'Reset Password',
        'resend' => 'Resend Verification Email',
        'request' => 'Email Password Reset Link',
        'logout' => 'Log out',
    ],

];
