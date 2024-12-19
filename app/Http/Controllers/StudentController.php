<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  public function index() {
    $students = Student::all();

    return view('student.index', [
      'students' => $students
    ]);
  }

  public function create() {
    return view('student.create');
  }

  public function store(Request $request) {

    /* Data Validation */
    $validated = $request -> validate([
      'name'        => 'required',
      'username'    => 'required|min:4|max:6|unique:students',
      'email'       => 'required|email|unique:students',
      'cell'      => ['required', 'starts_with:01,8801,+8801', 'regex:/^\+?[0-9]{11,15}$/', 'unique:students'], // Regex for phone number validation
    ], [
      'name.required'    => 'নামের ঘরটি পূরণ করুন!',
      'email.email'      => 'আপনার দেওয়া ইমেইলটি সঠিক নয়!',
    ]);

    /* Data Store */
    Student::create([
      'name'        => $request -> name,
      'username'    => $request -> username,
      'email'       => $request -> email,
      'cell'        => $request -> cell,
      'education'   => $request -> edu,
    ]);

    /* Return back with a message */
    return back() -> with('success', 'Student data added successfully!');
  }

  public function show($username) {
    // Query by the username instead of the primary key (id)
    $student = Student::where('username', $username)->firstOrFail();

    // Return the view with the student data
    return view('student.show', [
      'student' => $student
    ]);
  }

  /* Edit Student Data */
  public function edit($username) {
    // Query by the username instead of the primary key (id)
    $edit_data = Student::where('username', $username)->firstOrFail();

    // Return the view with the student data
    return view('student.edit', [
      'edit_data' => $edit_data
    ]);
  }

  /* Update Student Data */
  public function update(Request $request, $username) {
    $update_data = Student::where('username', $username) -> firstOrFail();

    $update_data -> update([
      'name'        => $request -> name,
      'username'    => $request -> username,
      'email'       => $request -> email,
      'cell'        => $request -> cell,
      'education'   => $request -> edu
    ]);

    return back() -> with('success', 'Student Data Updated Successfully.');
  }

  /* Student Data Delete */
  public function destroy($id) {
    // findOrFail(),find the student record by primary key (id)
    $delete_data = Student::findOrFail($id);

    // Delete the student record
    $delete_data->delete();

    /* Return back with a message */
    return back()->with('success', 'Student Data Deleted Successfully!');
  }
}
