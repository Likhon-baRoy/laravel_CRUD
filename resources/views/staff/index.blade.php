@extends('layouts.app')
@section('title', 'Staff Dashboard')

@section('css')
  <!-- Add Bootstrap CSS (Make sure it’s before your custom styles) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
@endsection

@section('main')

  <div class="wrap-table" style="width: 1000px;">
    <div class="card shadow">
      <div class="card-body">
        <h2 class="text-center mb-4">All Staff Information</h2>
        <hr />

        @include('validate')

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Cell</th>
                <th>Photo</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            @forelse($staff as $item)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->cell }}</td>
                <td><img src="{{ url('storage/image/staff/' . $item->photo) }}" alt="Staff profile picture" class="img-fluid mx-auto d-block" width="100" /></td>
                <td>
                  <a class="btn btn-sm btn-info" href="{{ route('staff.show', $item->id) }}">View</a>
                  <a class="btn btn-sm btn-warning" href="{{ route('staff.edit', $item->id) }}">Edit</a>

                  <form method="POST" id="form" action="{{ route('staff.destroy', $item->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="10" class="text-center">No Data Found in Item Database!</td>
              </tr>
            @endforelse
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Centered Button Section -->
    <div class="d-flex justify-content-center mt-4">
      <a class="btn btn-primary btn-sm" href="{{ route('staff.create') }}">Add new Staff</a>
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
