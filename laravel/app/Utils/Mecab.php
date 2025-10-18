<?php

namespace App\Utils;

use Http;

class Mecab
{
    public static function parse(string $text): array
    {
        $body = Http::post('host.docker.internal:81/api/mecab', compact('text'));
        return json_decode($body->body(), true);
    }
}
