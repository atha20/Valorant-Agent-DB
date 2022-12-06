<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Role;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class AgentController extends Controller
{
    public function index()
    {
        $datas = DB::select('select * from agentview where deleted_at is null');
        return view('agent.index',['datas'=>$datas]);
    }

    public function create()
    {
        $agents = DB::select('select * from agent');
        $roles = DB::select('select * from role');
        $country = DB::select('select * from country');
        return view('agent.add',['agents'=>$agents, 'roles'=>$roles, 'country'=>$country]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'AgentID' => 'required', 
            'AgentName' => 'required', 
            'Gender' => 'required', 
            'Race' => 'required', 
            'RoleID' => 'required', 
            'CountryID' => 'required', 
        ]);
        DB::insert('INSERT INTO agent(AgentID, AgentName, Gender, Race, RoleID, CountryID) VALUES (:AgentID, :AgentName, :Gender, :Race, :RoleID, :CountryID)', 
        [ 
            'AgentID' => $request->AgentID, 
            'AgentName' => $request->AgentName,
            'Gender' => $request->Gender, 
            'Race' => $request->Race, 
            'RoleID' => $request->RoleID, 
            'CountryID' => $request->CountryID,
        ]); 
        return redirect('/');
    }

    public function edit($id)
    {
        $agents = DB::select('select * from agent where AgentID = ?',[$id]);
        $roles = DB::select('select * from role');
        $country = DB::select('select * from country');
        return view('agent.edit',['agents'=>$agents, 'roles'=>$roles, 'country'=>$country]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'AgentID' => 'required', 
            'AgentName' => 'required', 
            'Gender' => 'required', 
            'Race' => 'required', 
            'RoleID' => 'required', 
            'CountryID' => 'required',
        ]);

        DB::update('UPDATE agent SET AgentID =  :AgentID, AgentName = :AgentName, Gender = :Gender,  Race = :Race, RoleID = :RoleID, CountryID = :CountryID WHERE AgentID = :id', 
        [
            'id' => $id,
            'AgentID' => $request->AgentID, 
            'AgentName' => $request->AgentName,
            'Gender' => $request->Gender, 
            'Race' => $request->Race, 
            'RoleID' => $request->RoleID, 
            'CountryID' => $request->CountryID,
        ]);
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM agent WHERE AgentID = :AgentID', ['AgentID' => $id]);
        return redirect()->route('removed');
    }

    public function softDelete($id) {
        DB::update('UPDATE agent SET deleted_at = now() WHERE AgentID = :AgentID', ['AgentID' => $id]);
        return redirect()->route('index');
    }

    public function restore($id){
        DB::update('UPDATE agent SET deleted_at = null WHERE AgentID = :AgentID', ['AgentID' => $id]);
        return redirect()->route('index');
    }

    public function removeIndex() {
        $datas = DB::select('SELECT * FROM agentview where deleted_at is not null');
        return view('agent.deleted')->with('datas', $datas);
    }

    public function search(Request $request) {
        $search = $request->search;

        $datas = DB::table('agentview')
        ->where('AgentID', 'like', "%$search%")
        ->orWhere('AgentName', 'like', "%$search%")
        ->orWhere('Race', 'like', "%$search%")
        ->orWhere('Gender', 'like', "%$search%")
        ->orWhere('RoleType', 'like', "%$search%")
        ->orWhere('CountryName', 'like', "%$search%")
        ->get();

        return view('agent.index')->with('datas', $datas);
    }
}
