<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApiHelper
{
    const URL = 'https://jsonplaceholder.typicode.com';

    public static function fetchUsers()
    {
        $response = Http::get(self::URL . '/users');
        return $response->json();
    }

    public static function fetchPosts()
    {
        $response = Http::get(self::URL . '/posts');
        return $response->json();
    }

    public static function managePostData($attr)
    {
        $attr = self::renameAttr($attr, 'id', 'external_id');
        $attr = self::renameAttr($attr, 'userId', 'user_id');

        return $attr;
    }
    
    public static function manageUserData($attr)
    {
        $attr = self::renameAttr($attr, 'id', 'external_id');

        return $attr;
    }

    private static function renameAttr($attr, $oldKey, $newKey)
    {
        $attr[$newKey] = $attr[$oldKey];
        unset($attr[$oldKey]);

        return $attr;
    }
}