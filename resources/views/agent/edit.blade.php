@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(48,48,48,.9);">
                    <div class="card-header">Edit Data</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Error!!!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @foreach ($agents as $agent)
                        <form action="{{ route('update', $agent->AgentID) }}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="AgentID" class="col-md-4 col-form-label text-md-right">AgentID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="AgentID" readonly="" value="{{ $agent->AgentID }}">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="AgentName" class="col-md-4 col-form-label text-md-right">Agent Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="AgentName" value="{{ $agent->AgentName }}">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="Race" class="col-md-4 col-form-label text-md-right">Race</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Race" value="{{ $agent->Race }}">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="Gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Gender" value="{{ $agent->Gender }}">
                                </div>
                            </div>                           
                            <div class="form-group row mb-3">
                                <label for="RoleType" class="col-md-4 col-form-label text-md-right">Role</label>
                                <div class="col-md-6">
                                    <select name="RoleID" required id="RoleID" class="form-control">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->RoleID }}">{{ $role->RoleType }}</option>
                                        @endforeach
                                    </select>
                                </div>        
                            </div>
                            <div class="form-group row mb-3">
                                <label for="CountryName" class="col-md-4 col-form-label text-md-right">Origin</label>
                                <div class="col-md-6">
                                    <select name="CountryID" required id="CountryID" class="form-control">
                                        @foreach ($country as $coun)
                                        <option value="{{ $coun->CountryID }}">{{ $coun->CountryName }}</option>
                                        @endforeach
                                    </select>
                                </div>        
                            </div>   
                            <div class="col-md-5 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a class="btn btn-danger" href="{{ route('index') }}">Back</a>
                            </div>
                        </form>
                        @endforeach   
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection