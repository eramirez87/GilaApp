@extends('layout.main')
@section('title','Login')
@section("content")
<form method="POST" action="{{ route('login.authenticate') }}">
    @csrf
    <div class="d-flex aligns-items-center justify-content-center card w-75 mx-auto mb-3 mt-4" style="max-width: 18rem;">
        <div class="card-header">Login</div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="check">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
        @endif
      </div>
</form>
@endsection
