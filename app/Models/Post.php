<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    /**
     * Fetches all posts.
     * @return array
     */
    public static function all()
    {
        return array_map(
            fn ($file) =>
            $file->getContents(),
            File::files(resource_path("posts"))
        );
    }

    /**
     * Fetches a post by its id.
     * @param $postId
     * @return string
     */
    public static function find($postId)
    {
        if (!file_exists($path =  resource_path("posts/${postId}.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("post${postId}", now()->addMinutes(2), function () use ($path) {
            var_dump("Cache expired, loaded post from File System");
            return file_get_contents($path);
        });
    }
}
