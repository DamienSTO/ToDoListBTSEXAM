<?php
// JWT.php

class JWT
{
    public static function encode($payload, $key, $alg = 'HS256')
    {
        $header = json_encode(['typ' => 'JWT', 'alg' => $alg]);
        $payload = json_encode($payload);

        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $key, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    public static function decode($jwt, $key, $alg = 'HS256')
    {
        list($base64UrlHeader, $base64UrlPayload, $base64UrlSignature) = explode('.', $jwt);

        $header = json_decode(base64_decode($base64UrlHeader), true);
        if ($header['alg'] !== $alg) {
            throw new Exception('Algorithm not supported');
        }

        $payload = json_decode(base64_decode($base64UrlPayload), true);
        $signature = base64_decode(str_replace(['-', '_'], ['+', '/'], $base64UrlSignature));

        $validSignature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $key, true);

        if (!hash_equals($validSignature, $signature)) {
            throw new Exception('Signature verification failed');
        }

        if ($payload['exp'] < time()) {
            throw new Exception('Token has expired');
        }

        return $payload;
    }
}
?>