@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(48,48,48,.9);">
                    <div class="card-body">
                    @if(session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                        <form action="{{ route('password.action') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="new_password_confirm" class="col-md-4 col-form-label text-md-right">New Password Confirmation</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="new_password_confirm" required>
                                </div>
                            </div>
    
                            <div class="col-md-5 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Change
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