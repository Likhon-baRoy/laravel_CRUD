@extends('layouts.app')

@section('title', 'Update Single Staff Data')

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
        <h2 class="text-center mb-4">Update Staff Data</h2>
        <hr />

        @include('validate')

        <form method="POST" enctype="multipart/form-data" action="{{ route('staff.update', $staff -> id) }}" class="mx-auto" style="max-width: 600px;">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $staff -> name}}">
          </div>

          <div class="form-group">
            <label for="cell">Cell:</label>
            <input type="tel" id="cell" name="cell" class="form-control" value="{{ $staff -> cell }}">
          </div>

          <div class="form-group">
            <input type="file" name="new_photo" value="" />
            <input type="hidden" name="old_photo" value="{{ $staff -> photo }}" /> <hr />
            <img src="{{ url('storage/image/staff/' . $staff -> photo) }}" alt="staff profile picture" class="img-fluid mx-auto d-block" width="100" />
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Update Now</button>
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
