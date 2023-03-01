@extends('layouts.app')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <main class="form-register">
        <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
          <form action="/register" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" class="form-control rounded-top @error('name')
              is-invalid @enderror" id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
              <label for="name">Name</label>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating">
              <input type="text" class="form-control @error('username')
              is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating">
              <input type="email" class="form-control @error('email')
              is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating">
              <input type="password" class="form-control rounded-bottom"
                id="password" name="password" placeholder="Password">
              <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          </form>

          <small class="d-block mt-3 text-center">Already registered?<a
              href="/login" class="text-decoration-none"> Login</a></small>
      </main>
    </div>
  </div>
@endsection
