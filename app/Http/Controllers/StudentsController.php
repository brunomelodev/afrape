<?php

namespace App\Http\Controllers;

use App\Http\Requests\students\StoreStudentsRequest;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::paginate(15);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $options = [
            'male' => 'Masculino',
            'female' => 'Feminino'
        ];
        return view('students.create', compact('options'));
    }

    public function store(StoreStudentsRequest $request)
    {
        $newstudent = $request->validated();
        $newstudent['created_at'] = now();
        $newstudent['updated_at'] = now();


        //verificar como vai ficar e o que é
        $newstudent['active'] = 1;
        $newstudent['support'] = 1;
        $newstudent['status'] = 'active';

        // dd($newstudent);


        Students::create($newstudent);

        return redirect()
            ->route('students.index')
            ->with('success', 'Aluno criado com sucesso!');
    }

    public function show(string $id)
    {
        $student = Students::find($id);
        $student['birthday'] = date('d/m/Y', strtotime($student->birthday));
        $student['date_of_entry'] = date('d/m/Y', strtotime($student->date_of_entry));
        $student['gender'] = $student->gender == 'male' ? 'Masculino' : 'Feminino';
        return view('students.show', compact('student'));
    }
}
