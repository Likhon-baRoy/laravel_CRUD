<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $staff = Staff::latest() -> get();

    return view('staff.index', compact('staff'));
    /* return view('staff.index', [
     *   'staff' => $staff
     * ]); */
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    return view('staff.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Data Validation
    $validated = $request -> validate([
      'name'        => ['required'],
      'email'       => ['required', 'unique:staff', 'email'],
      'cell'        => ['required', 'unique:staff'],
    ]);

    // photo Upload
    if ( $request -> hasFile('photo')) {
      $img = $request -> file('photo');
      $file_name = md5(time().rand()) .'.'. $img -> clientExtension();
      $img -> move(storage_path('app/public/image/staff/'), $file_name);
    } else {
      $file_name = 'avatar.png';
    }

    // send staff data to database
    Staff::create([
      'name'    => $request -> name,
      'email'   => $request -> email,
      'cell'    => $request -> cell,
      'photo'   => $file_name
    ]);

    return back() -> with('success', 'Staff data added');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    // Query by the primary key (id)
    $staff = Staff::findOrFail($id);

    // return the view with Staff data
    return view('staff.show', compact('staff'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // find user by ID
    $staff = Staff::findOrFail($id);

    return view('staff.edit', compact('staff'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // find the user by given ID
    $update_data = Staff::findOrFail($id);

    // Data Validation
    $validated = $request -> validate([
      'name'        => ['required'],
      'cell' => ['required', 'unique:staff,cell,' . $id], // Exclude the current record from the uniqueness check
    ]);

    // check for new photo
    if ( $request -> hasFile('new_photo') ) {
      $img = $request -> file('new_photo'); // store the photo
      $file_name = md5(time().rand()) .'.'. $img -> clientExtension(); // generate a name for photo
      $img -> move(storage_path('app/public/image/staff/'), $file_name); // add photo in storage with the generated name

      // Remove old photo from storage
      if ( $request -> hasFile('old_photo')) { /* check if the old_photo already have been delete menually to handle the Error */
        unlink('storage/image/staff/' . $request -> old_photo);
      }

    } else {
      $file_name = $request -> old_photo;
    }

    $update_data -> update([
      'name'    => $request -> name,
      'cell'    => $request -> cell,
    ]);

    return back() -> with('success', 'Staff data updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // find the staff record by primary key (id)
    $delete_data = Staff::findOrFail($id);

    // Delete the staff record
    $delete_data -> delete();

    // also Delete the user profile photo from the storage
    unlink('storage/image/staff/' . $delete_data -> photo);

    // now return back with a success message
    return back() -> with('success', 'Staff data deleted successfully');
  }
}
