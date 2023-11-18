<?php


use Illuminate\Support\Facades\Storage;


if (!function_exists('userId')) {
    function userId()
    {
        return auth()?->user()?->id;
    }
}
if (!function_exists('authUser')) {
    function authUser()
    {
        return auth()?->user();
    }
}

if (!function_exists('getAvatar')) {
    function getAvatar( $path, $default = null)
    {
        return   $path

        ?  Storage::disk('avatars')->url($path)
        
        
        : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($default)));
    }
}