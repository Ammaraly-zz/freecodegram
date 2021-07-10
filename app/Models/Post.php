<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    public static function find($postId)
    {
        if (!file_exists($path =  resource_path("posts/${postId}.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("post${postId}", now()->addMinutes(2), function () use ($path) {
            var_dump("Cache expired, loaded post from File Systm");
            return file_get_contents($path);
        });
    }
}
