<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }


    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'birthdate' => 'required|date',
        'address' => 'required|string|max:255',
        'section' => 'required|string|max:255',
        'remarks' => 'nullable|string|max:255',
    ]);

    // Create a new student record
    $student = Student::create([
        'fname' => $validatedData['fname'],
        'lname' => $validatedData['lname'],
        'birthdate' => $validatedData['birthdate'],
        'address' => $validatedData['address'],
    ]);

    // Create a new account record associated with the student
    Account::create([
        'student_id' => $student->id,
        'section' => $validatedData['section'],
        'remarks' => $validatedData['remarks'],
    ]);

    // Return the updated table as a partial view
    return view('students._table', ['students' => Student::all()]);
}


    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            // Add more validation rules as needed
        ]);

        $student->update($request->all());
        return redirect()->route('students.index');
    }

    // public function destroy(Student $student)
    // {
    //     $student->delete();
    //     return redirect()->route('students.index');
    // }

    public function destroy(Request $request, $id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Delete the student
        $student->delete();

        // Return a response that HTMX can use to update the table
        if ($request->wantsJson()) {
            return response()->json(['status' => 'success']);
        }

        return view('students._table', ['students' => Student::all()]);
    }
}
