@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(48,48,48,.9);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <a class="navbar-brand">REMOVED AGENT</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-danger" href="{{ route('index') }}">Back</a>                                  
                                </div>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                <p>{{ $message }}</p>
                                </div>
                                @endif
                                <table class="table">
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Race</th>
                                        <th>Gender</th>
                                        <th>Role</th> 
                                        <th>Origin</th>
                                        @guest
                                        @else
                                        <th>Action</th>
                                        @endguest
                                    </tr>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->AgentName }}</td>
                                        <td>{{ $data->Race }}</td>
                                        <td>{{ $data->Gender }}</td>
                                        <td>{{ $data->RoleType }}</td>
                                        <td>{{ $data->CountryName }}</td>
                                        <td>
                                            <a href="{{ route('restore', $data->AgentID) }}" class="btn btn-primary btn-sm">Restore</a>
                                            <form onsubmit="return confirm('Delete Permanently?')" class="d-inline" action="{{ route('delete', $data->AgentID) }}" method="post">
                                                @csrf
                                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection