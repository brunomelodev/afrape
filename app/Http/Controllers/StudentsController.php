<?php

namespace App\Http\Controllers;

use App\Http\Requests\students\StoreStudentsRequest;
use App\Http\Requests\students\UpdateStudentsRequest;
use App\Models\Students;

class StudentsController extends Controller
{
    var $options = [
        'male' => 'Masculino',
        'female' => 'Feminino'
    ];

    public function index()
    {
        $students = Students::paginate(15);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $options = $this->options;
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

    public function edit(string $id)
    {
        $options = $this->options;

        if (!$student = Students::find($id)) {
            return redirect()->route('students.index')
                ->with('message', 'Aluno não encontrado!');
        }

        return view('students.edit', compact('student', 'options'));
    }

    public function update(UpdateStudentsRequest $request, Students $student) {

        // if (!$student = Students::find($id)) {
        //     return back()->with('message', 'Aluno não encontrado!');
        // }
 
        $student->update($request->validated());

        return redirect()
            ->route('students.index')
            ->with('success', 'Aluno alterado com sucesso!');

        // $data = $request->all();
        // $data['password'] = bcrypt($data['password']);
        // User::where('id', $id)->update($data);
        // return redirect()->route('users.index')
        //     ->with('success', 'Usuário alterado com sucesso!');

    }

    public function destroy(string $id)
    {


        // if(Gate::denies('is-admin')) {
        //     return back()->with('message', 'Você não é um Administrador do Sistema!');
        // }

        if (!$student = Students::find($id)) {
            return redirect()->route('students.index')
                ->with('message', 'Usuário não encontrado!');
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Usuário excluido com sucesso!');
    }
}
