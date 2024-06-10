@extends('layouts.app')
@section('title','My Acount TH21')

@section('content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 1000px;">
      <div class="card-header text-center">
        <h3 class="text-primary">Your Account</h3>
      </div>
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-md-4">
            <div class="avatar-wrapper">
              <img src="{{ asset('uploads/user/' . $user->image) }}" alt="User Avatar" class="avatar-img img-fluid rounded-circle" style="border: 5px solid #fff; object-fit: cover;">
              <div class="avatar-status" style="background-color: {{ ($user->is_online) ? '#4CAF50' : '#F44336' }}">
                <span class="dot"></span>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <table class="table table-borderless">
              <tbody class="text-muted">
                <tr>
                  <th scope="row">Name:</th>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr>
                  <th scope="row">Email:</th>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <th scope="row">Phone:</th>
                  <td>{{ $user->phone }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    body {
  font-family: 'Arial', sans-serif;
  background-color: #f0f0f0;
}



.card {
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.card-header {
  font-size: 1.8rem;
  font-weight: bold;
  padding: 20px;
  background-color: #f8f9fa;
}

.avatar-wrapper {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.avatar-img {
  max-width: 250px;
  height: 250px;
  border: 5px solid #fff;
  object-fit: cover;
}

.avatar-status {
  position: absolute;
  bottom: 5px;
  right: 5px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
}

.dot {
  width: 100%;
  height: 100%;
  background-color: #fff;
  border-radius: 50%;
}

.table {
  width: 100%;
}

.table td {
  font-size: 1.4rem;
  padding: 1.5rem;
  vertical-align: middle;
}

.text-muted {
  color: #888;
}

.text-primary {
  color: #007bff;
}
  </style>


@endsection