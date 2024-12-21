@extends('layouts.app')
@section('title', 'Student Dashboard')

@section('css')
  <!-- Add Bootstrap CSS (Make sure it’s before your custom styles) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
@endsection

@section('main')

  <div class="wrap-table" style="width: 1370px;">
    <div class="card shadow">
      <div class="card-body">
        <h2 class="text-center mb-4">All Student Information</h2>
        <hr />

        @include('validate');

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Email</th>
                <th>Education</th>
                <th>Courses</th>
                <th>Cell</th>
                <th>Photo</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($students as $student)
                <tr>
                  <td>{{ $student->id }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->gender }}</td>
                  <td>{{ $student->username }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->education }}</td>
                  <td>
                    <ul>
                      @forelse(json_decode($student->courses ?? '[]') as $item)
                        <li>{{ $item }}</li>
                      @empty
                        <li>No course found</li>
                      @endforelse
                    </ul>
                  </td>
                  <td>{{ $student->cell }}</td>
                  <td><img src="{{ url('storage/image/students/' . $student->photo) }}" alt="student profile picture" class="img-fluid mx-auto d-block" width="100" /></td>
                  <td>
                    <a class="btn btn-sm btn-info" href="{{ route('student.show', $student->username) }}">View</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('student.edit', $student->username) }}">Edit</a>
                    <a class="btn btn-sm btn-danger delete-btn" href="{{ route('student.destroy', $student->id) }}">Delete</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="10" class="text-center">No Data Found in Student Database!</td>
                </tr>
              @endforelse
            </tbody>
          </table>

          {{ $students -> links() }}

        </div>
      </div>
    </div>

    <!-- Centered Button Section -->
    <div class="d-flex justify-content-center mt-4">
      <a class="btn btn-primary btn-sm" href="{{ route('student.create') }}">Add New Student</a>
    </div>
  </div>

@endsection

@section('scripts')
  <!-- Add jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Add Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Scripts -->
  <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
