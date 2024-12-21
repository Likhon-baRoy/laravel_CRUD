@extends('layouts.app')

@section('title', 'Update Single Student Data')

@section('css')
  <!-- Add Bootstrap CSS (Make sure it’s before your custom styles) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> -->
@endsection

@section('main')

  <div class="wrap">
    <div class="card shadow">
      <div class="card-body">
        <h2 class="text-center mb-4">Update Student Data</h2>
        <hr />

        @include('validate')

        <form method="POST" enctype="multipart/form-data" action="{{ route('student.update', $edit_data -> username) }}" class="mx-auto" style="max-width: 600px;">
          @csrf

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $edit_data -> name}}">
          </div>

          <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" class="form-control" value="{{ $edit_data -> age}}">
          </div>

          <div class="form-group">
            <label for="cell">Cell:</label>
            <input type="tel" id="cell" name="cell" class="form-control" value="{{ $edit_data -> cell }}">
          </div>

          <div class="form-group">
            <label for="education">Education:</label>
            <select class="form-control" name="edu">
              <option value="">-Select-</option>
              <option @if($edit_data -> education == 'SSC') selected @endif value="SSC">SSC</option>
              <option @if($edit_data -> education == 'HSC') selected @endif value="HSC">HSC</option>
              <option @if($edit_data -> education == 'Bsc') selected @endif value="Bsc">Bsc</option>
              <option @if($edit_data -> education == 'Msc') selected @endif value="Msc">Msc</option>
            </select>
          </div>

          <div class="form-group">
            <label for="gender">Gender:</label> <hr />

            @foreach ($genders as $gender)
              <label>
                <input type="radio" id="gender" name="gender" value="{{ $gender }}"
                       @if(old('gender', $edit_data -> gender) == $gender) checked @endif>
                {{ $gender }}
              </label>
            @endforeach
          </div>

          <br />
          <div class="form-group">
            <label for="courses">Select your courses:</label> <hr />
            @foreach( $courses as $course )
              <label>
                <input
                  @if( in_array($course, json_decode($edit_data->courses ?? '[]', true)) )
                    checked
                  @endif
                  type="checkbox"
                  name="courses[]"
                  value="{{ $course }}"
                  id="courses">
                {{ $course }}
              </label> <br />
            @endforeach
          </div>

          <div class="form-group">
            <input type="file" name="new_photo" value="" />
            <input type="hidden" name="old_photo" value="{{ $edit_data -> photo }}" /> <hr />
            <img src="{{ url('storage/image/students/' . $edit_data -> photo) }}" alt="student profile picture" class="img-fluid mx-auto d-block" width="100" />
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Update Now</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Centered Button Section -->
    <div class="d-flex justify-content-center mt-4">
      <a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Student Dashboard</a>
    </div>
  </div>

@endsection

@section('scripts')
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
