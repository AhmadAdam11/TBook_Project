@extends('layouts.app') 
@section('content')
    <div class="container">
        <h1>Selamat datang di Dashboard</h1>
        <p>Halo, {{ Auth::guard('admin')->user()->name }}</p>
    </div>
@endsection
