<?php

namespace App\Utils;

class Capture
{
    public static function isSuccessed(string $code): bool
    {
        $param = [
            'secret' => config('google.rcapture'),
            'response' => $code,
        ];
        $url = 'https://www.google.com/recaptcha/api/siteverify?' . http_build_query($param);
        $response = json_decode(file_get_contents($url));
        if (!$response->success) {
            return false;
        }
        return true;
    }
}
