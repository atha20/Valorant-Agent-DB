@extends('app')
@section('content')
<main class="login-form">
    <div class="bg-image"></div>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(48,48,48,.9);">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                        <form action="{{ route('register.action') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirm" required>
                                </div>
                            </div>
    
                            <div class="col-md-5 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <a class="btn btn-danger" href="{{ route('index') }}">Back</a>
                            </div>
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection