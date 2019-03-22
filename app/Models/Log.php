<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "logs";

    public function logme($type, $msg, $class, $line, $id)
    {
        Log::$type($msg, ['class' => $class, 'line' => $line, 'user_id' => $id]);

        $log = new Log();
        $log->class = $class;
        $log->line = $line;
        $log->msg = $msg;
        $log->user_id = $id;
        $log->save();
    }

    public function scopeGetUnresolvedLogs($query)
    {
        return $query->where('unresolved', '=', 0);
    }
}
