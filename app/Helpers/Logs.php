<?php namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class Logs
{
    public static function logme($type, $msg, $class, $line, $id)
    {
        Log::$type($msg, ['class' => $class, 'line' => $line, 'user_id' => $id]);
    }
}
