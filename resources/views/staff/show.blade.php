@extends('layouts.app')
@section('title', 'Show Staff Profile')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('main')
  <div class="wrap">
    <a class="btn btn-primary btn-sm" href="{{ route('staff.index') }}">Staff Dashboard</a>
    <br />
    <br />
    <div class="card shadow">
      <div class="card-body">
        <h2>Staff Profile</h2>
        <img src="{{ url('storage/image/staff/' . $staff->photo) }}" alt="staff profile picture" class="img-fluid mx-auto d-block" width="100" />
        <h3> {{ $staff -> name }}</h3>
        <h4> {{ $staff -> email }}</h4>
        <p> {{ $staff -> cell }}</p>
      </div>
    </div>
  </div>
@endsection
