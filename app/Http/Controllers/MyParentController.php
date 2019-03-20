<?php

namespace App\Http\Controllers;

use App\Helpers\Alerts;
use App\Helpers\Logs as L;

class MyParentController extends Controller
{
    protected $alert;
    protected $log;

    public function __construct()
    {
        $this->alert = new Alerts();
        $this->log = new L();
    }
}
