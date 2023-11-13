<?php


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