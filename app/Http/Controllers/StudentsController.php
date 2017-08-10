<?php

namespace App\Http\Controllers;

use App\Student;
use App\Office365;
use App\Repositories\Students;

class StudentsController extends Controller {


    private $office;
    private $repo;

    function __construct(
        Students $repo,
        Office365 $office
    ) {

        $this->repo = $repo;
        $this->office = $office;
    }


    function all() {
            
        $students = $this->repo->all();

        // get all documents shared
        $documents = $this->office->documents();

        return view('students.list', [
            'students' => $students, 
            'documents' => $documents
        ]);

    }

    
    function create() {
        return view('students.create');
    }


    function details($id) {        

        $id = (int) $id;

        $student = $this->repo->find($id);

        if($student == null) {
            abort(404);
        }

        return view('students.details', ['student' => $student]);
    }

    function store() {


        $this->validate(request(), [
            'name' => 'required',
            'family_name' => 'required',
        ]);
         

        $this->repo->create(request()->only(['grade', 'name', 'family_name']));

        return redirect('/students');
    }

}