<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class Subjects extends MyParentController
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function saveSubject()
    {

    }

    public function updateSubject()
    {

    }

    public function deleteSubject()
    {

    }
}
