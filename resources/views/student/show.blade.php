@extends('layouts.app')
@section('title', 'Show Student Profile')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('main')
  <div class="wrap">
    <a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Student Dashboard</a>
    <br />
    <br />
    <div class="card shadow">
      <div class="card-body">
        <h2>Student Profile</h2>
        <img src="{{ url('storage/image/students/' . $student->photo) }}" alt="student profile picture" class="img-fluid mx-auto d-block" width="100" />
        <h3> {{ $student -> name }}</h3>
        <h4> {{ $student -> email }}</h4>
        <p> {{ $student -> cell }}</p>
      </div>
    </div>
  </div>
@endsection
