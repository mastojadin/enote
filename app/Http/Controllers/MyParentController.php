<?php

namespace App\Http\Controllers;

use App\Helpers\Alerts;
use App\Models\Log as L;

class MyParentController extends Controller
{
    protected $alert;
    protected $log;

    public function __construct(Alerts $alert, L $log)
    {
        $this->alert = $alert;
        $this->log = $log;
    }
}
