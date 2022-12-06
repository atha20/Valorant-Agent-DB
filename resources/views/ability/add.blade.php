@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(48,48,48,.9);">
                    <div class="card-header">Add New Ability</div>
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
                        <form action="{{ route('abilityStore') }}" method="POST">
                            @csrf                            
                            <div class="form-group row mb-3">
                                <label for="AgentID" class="col-md-4 col-form-label text-md-right">Agent</label>
                                <div class="col-md-6">
                                    <select name="AgentID" required id="AgentID" class="form-control">
                                        <option value="" disabled selected>Choose Agent</option>
                                        @foreach ($agents as $agent)
                                        <option value="{{ $agent->AgentID }}">{{ $agent->AgentName }}</option>
                                        @endforeach
                                    </select>
                                </div>        
                            </div>
                            <div class="form-group row mb-3">
                                <label for="AbilityID" class="col-md-4 col-form-label text-md-right">AbilityID</label>
                                <div class="col-md-6">
                                    @foreach ($abilities as $abilitiy)
                                    @endforeach
                                    <input type="text" class="form-control" name="AbilityID" id="AbilityID" readonly="" value="{{ $abilitiy->AbilityID+1 }}">     
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="AbilityName" class="col-md-4 col-form-label text-md-right">Ability Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="AbilityName">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="AbilityType" class="col-md-4 col-form-label text-md-right">Ability Type</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="AbilityType">
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                                <a class="btn btn-danger" href="{{ route('abilityIndex') }}">Back</a>
                            </div>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection