<?php

namespace App\Http\Controllers;

use App\Models\Subject;

use App\Rules\AlphaSpaces;

class Subjects extends MyParentController
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function saveSubject()
    {
        request()->validate([
            'new_subject' => [new AlphaSpaces],
        ]);

        $new_subject = request('new_subject');

        try {
            $subject = new Subject();
            $subject->subject = $new_subject;
            $subject->save();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }

    public function updateSubject()
    {
        request()->validate([
            'update_subject' => [new AlphaSpaces],
        ]);

        $id = request('update_id');
        $update_subject = request('update_subject');

        try {
            $subject = Subject::find($id);
            $subject->subject = $update_subject;
            $subject->save();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }

    public function deleteSubject()
    {
        $id = request('delete_id');

        try {
            $subject = Subject::find($id);
            $subject->delete();
        } catch(\Exception $e) {
            $this->log->logme('debug', $e->getMessage(), __CLASS__, __LINE__, auth()->user()->id);
            session()->flash('myAlert', $this->alert->getAlert('10'));
            return redirect()->back();
        }

        session()->flash('myAlert', Alerts::getAlert('00'));
        return redirect()->back();
    }
}
