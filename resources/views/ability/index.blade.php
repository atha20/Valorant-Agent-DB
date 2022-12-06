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
                                    <a class="navbar-brand">ABILITY</a>
                                </div> 
                                @guest
                                <div class="pull-right">                                      
                                    <form action="{{ route('abilitySearch') }}" method="GET" >
                                        <button style="color: #fff; background-color: transparent; border-color: transparent;" href="{{ route('abilityIndex') }}"><i class="fa fa-refresh fa-2x" style="position: relative; bottom: 3px;"></i></button>
                                        <input style="position: relative; width: 100px; bottom: 9px;" type="search" name="search" placeholder="Find" value="{{ Request::get('abilitySearch')}}">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a class="btn btn-danger" href="{{ route('index') }}">Back</a>
                                    </form> 
                                </div>
                                @else
                                <div class="pull-right">
                                    <form action="{{ route('abilitySearch') }}" method="GET" >
                                        <button style="color: #fff; background-color: transparent; border-color: transparent;" href="{{ route('abilityIndex') }}"><i class="fa fa-refresh fa-2x" style="position: relative; bottom: 3px;"></i></button>
                                        <input style="position: relative; width: 100px; bottom: 9px;" type="search" name="search" placeholder="Find" value="{{ Request::get('abilitySearch')}}">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a class="btn btn-info" href="{{ route('abilityRemoved') }}"> Removed Ability</a>
                                        <a class="btn btn-success" href="{{ route('abilityAdd') }}"> Add New Ability</a>  
                                        <a class="btn btn-danger" href="{{ route('index') }}">Back</a>
                                    </form>                                
                                </div>
                                @endguest
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                <p>{{ $message }}</p>
                                </div>
                                @endif
                                <table class="table">
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Ability Name </th>
                                        <th>Type</th>
                                        @guest
                                        @else
                                        <th>Action</th>
                                        @endguest
                                    </tr>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->AgentName }}</td>
                                        <td>{{ $data->AbilityName }}</td>
                                        <td>{{ $data->AbilityType }}</td>
                                        @guest
                                        @else
                                        <td>
                                            <form onsubmit="return confirm('Remove Ability?')" method="POST" action="{{ route('abilityRemove', $data->AbilityID) }}">
                                                <a href="{{ route('abilityEdit', $data->AbilityID) }}" type="button" class="btn btn-warning">Edit</a>
                                                @csrf
                                                <button type="submit" name="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                        </td>
                                        @endguest
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