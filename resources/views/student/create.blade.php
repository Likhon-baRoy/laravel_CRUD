@extends('layouts.app')

@section('title', 'Student Registraton Form')

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
        <h2 class="text-center mb-4">Add New Student</h2>
        <hr />

        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $errors->first() }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data" class="mx-auto" style="max-width: 300px;">
          @csrf

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your full name">
            @error('name')
            <p class="text-danger"><i>* Required</i></p>
            @enderror
          </div>

          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" placeholder="e.g., abc007">
            @error('username')
            <p class="text-danger"><i>* Required</i></p>
            @enderror
          </div>

          <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" class="form-control" value="{{ old('age') }}">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <p class="text-danger"><i>* Required</i></p>
            @enderror
          </div>

          <div class="form-group">
            <label for="cell">Cell:</label>
            <input type="tel" id="cell" name="cell" class="form-control" value="{{ old('cell') }}" placeholder="+88016XXXXXXXX">
            @error('cell')
            <p class="text-danger"><i>* Required</i></p>
            @enderror
          </div>

          <div class="form-group">
            <label for="education">Education:</label>
            <select class="form-control" name="edu">
              <option value="">-Select-</option>
              <option value="SSC" {{ old('edu') == 'SSC' ? 'selected' : '' }}>SSC</option>
              <option value="HSC" {{ old('edu') == 'HSC' ? 'selected' : '' }}>HSC</option>
              <option value="Bsc" {{ old('edu') == 'Bsc' ? 'selected' : '' }}>Bsc</option>
              <option value="Msc" {{ old('edu') == 'Msc' ? 'selected' : '' }}>Msc</option>
            </select>
          </div>

          <div class="form-group">
            <label for="photo">Select a Photo:</label>
            <input type="file" id="photo" name="photo">
          </div>

          <div class="form-group">
            <label for="gender">Gender:</label> <hr />
            <lebel>
              <input type="radio" id="gender" name="gender" value="Male">
              Male
            </lebel>
            <lebel>
              <input type="radio" id="gender" name="gender" value="Female">
              Female
            </lebel>
          </div>

          <br />
          <div class="form-group">
            <label for="courses">Select your courses:</label> <hr />
            <lebel>
              <input type="checkbox" name="courses[]" value="MERN Stack Devs" id="courses">
              MERN Stack Devs
            </lebel>
            <br />
            <lebel>
              <input type="checkbox" name="courses[]" value="NFT Devs" id="courses">
              NFT Devs
            </lebel>
            <br />
            <lebel>
              <input type="checkbox" name="courses[]" value="BlockChain Devs" id="courses">
              BlockChain Devs
            </lebel>
            <br />
            <lebel>
              <input type="checkbox" name="courses[]" value="Laravel Devs" id="courses">
              Laravel Devs
            </lebel>
            <br />
            <lebel>
              <input type="checkbox" name="courses[]" value="Django Devs" id="courses">
              Django Devs
            </lebel>
            <br />
            <lebel>
              <input type="checkbox" name="courses[]" value="React Devs" id="courses">
              React Devs
            </lebel>
            <br />
            <lebel>
              <input type="checkbox" name="courses[]" value="Native Apps Devs" id="courses">
              Native Apps Devs
            </lebel>
          </div>

          <hr />
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Add Now</button>
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
