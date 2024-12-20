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

    /*     return $request -> all(); */

    /* Data Validation */
    $validated = $request -> validate([
      'name'        => 'required',
      'username'    => 'required|min:4|max:10|unique:students',
      'email'       => 'required|email|unique:students',
      'cell'        => ['required', 'starts_with:01,8801,+8801', 'regex:/^\+?[0-9]{11,15}$/', 'unique:students'], // Regex for phone number validation
      'age'         => 'required|min:2|max:3',
      'gender'      => 'required',
    ], [
      'name.required'    => 'নামের ঘরটি পূরণ করুন!',
      'email.email'      => 'আপনার দেওয়া ইমেইলটি সঠিক নয়!',
    ]);

    // Upload photo
    if ( $request -> hasFile('photo') ) {
      $img = $request -> file('photo');
      $file_name = md5(time().rand()) .'.'. $img -> clientExtension();
      $img -> move(storage_path('app/public/image/students/'), $file_name);
    } else {
      $file_name = null;
    }

    /* Data Store */
    Student::create([
      'name'        => $request -> name,
      'username'    => $request -> username,
      'email'       => $request -> email,
      'cell'        => $request -> cell,
      'education'   => $request -> edu,
      'age'         => $request -> age,
      'gender'      => $request -> gender,
      'photo'       => $file_name,
      'courses'     => json_encode($request->courses)
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
      'edit_data'    => $edit_data,
      'genders'      => ['Male', 'Female'],
      'courses'      => ['MERN Stack Devs', 'NFT Devs', 'BlockChain Devs', 'Laravel Devs', 'Django Devs', 'React Devs', 'Native Apps Devs']
    ]);
  }

  /* Update Student Data */
  public function update(Request $request, $username) {
    $update_data = Student::where('username', $username) -> firstOrFail();

    if ( $request -> hasFile('new_photo') ) {
      $img = $request -> file('new_photo');
      $file_name = md5(time().rand()) .'.'. $img -> clientExtension();
      $img -> move(storage_path('app/public/image/students/'), $file_name);
    } else {
      $file_name = $request -> old_photo;
    }

    $update_data -> update([
      'name'        => $request -> name,
      'username'    => $request -> username,
      'email'       => $request -> email,
      'cell'        => $request -> cell,
      'education'   => $request -> edu,
      'gender'      => $request -> gender,
      'courses'     => json_encode($request->courses),
      'photo'       => $file_name
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
