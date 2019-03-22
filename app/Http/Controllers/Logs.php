<?php

namespace App\Http\Controllers;

use App\Models\Log as L;

class Logs extends Controller
{
    public function index()
    {
        $logs = L::getUnresolvedLogs();

        return view('logs.index', compact('logs'));
    }

    public function resolve()
    {
        $id = request('log_id');

        try {
            $log = L::find($id);
            $log->resolve = 1;
            $log->save();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }
}
