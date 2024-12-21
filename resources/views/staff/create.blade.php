@extends('layouts.app')

@section('title', 'Staff Registraton Form')

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
        <h2 class="text-center mb-4">Add new Staff</h2>
        <hr />

        @include('validate')

        <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data" class="mx-auto" style="max-width: 300px;">
          @csrf

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your full name">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="cell">Cell:</label>
            <input type="tel" id="cell" name="cell" class="form-control" value="{{ old('cell') }}" placeholder="+88016XXXXXXXX">
          </div>

          <div class="form-group">
            <label for="photo">Select a Photo:</label>
            <input type="file" id="photo" name="photo">
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
      <a class="btn btn-primary btn-sm" href="{{ route('staff.index') }}">Staff Dashboard</a>
    </div>
  </div>

@endsection

@section('scripts')
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
