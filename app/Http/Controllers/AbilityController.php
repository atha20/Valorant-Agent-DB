<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class AbilityController extends Controller
{
    public function abilityIndex()
    {
        $datas = DB::select('select * from abilityview where deleted_at is null');
        return view('ability.index',['datas'=>$datas]);
    }

    public function abilityCreate()
    {
        $abilities = DB::select('select * from ability');
        $agents = DB::select('select * from agent');
        return view('ability.add',['abilities'=>$abilities, 'agents'=>$agents]);
    }

    public function abilityStore(Request $request)
    {
        $request->validate([
            'AbilityID' => 'required', 
            'AbilityName' => 'required', 
            'AbilityType' => 'required', 
            'AgentID' => 'required', 
        ]);
        DB::insert('INSERT INTO ability (AbilityID, AbilityName, AbilityType, AgentID) VALUES (:AbilityID, :AbilityName, :AbilityType, :AgentID)', 
        [ 
            'AbilityID' => $request->AbilityID, 
            'AbilityName' => $request->AbilityName,
            'AbilityType' => $request->AbilityType, 
            'AgentID' => $request->AgentID, 
        ]); 
        return redirect('index');
    }

    public function abilityEdit($id)
    {
        $abilities = DB::select('select * from ability where AbilityID = ?',[$id]);
        $agents = DB::select('select * from agent');
        return view('ability.edit',['abilities'=>$abilities, 'agents'=>$agents]);
    }

    public function abilityUpdate($id, Request $request)
    {
        $request->validate([
            'AbilityID' => 'required', 
            'AbilityName' => 'required', 
            'AbilityType' => 'required', 
            'AgentID' => 'required', 
        ]);

        DB::update('UPDATE ability SET AbilityID = :AbilityID, AbilityName = :AbilityName, AbilityType = :AbilityType,  AgentID = :AgentID WHERE AbilityID = :id', 
        [
            'id' => $id,
            'AbilityID' => $request->AbilityID, 
            'AbilityName' => $request->AbilityName,
            'AbilityType' => $request->AbilityType, 
            'AgentID' => $request->AgentID, 
        ]);
        return redirect()->route('abilityIndex');
    }

    public function abilityDestroy($id)
    {
        DB::delete('DELETE FROM ability WHERE AbilityID = :AbilityID', ['AbilityID' => $id]);
        return redirect()->route('abilityRemoved');
    }

    public function abilitySoftDelete($id) {
        DB::update('UPDATE ability SET deleted_at = now() WHERE AbilityID = :AbilityID', ['AbilityID' => $id]);
        return redirect()->route('abilityIndex');
    }

    public function abilityRestore($id){
        DB::update('UPDATE ability SET deleted_at = null WHERE AbilityID = :AbilityID', ['AbilityID' => $id]);
        return redirect()->route('abilityRemoved');
    }

    public function abilityRemoveIndex() {
        $datas = DB::select('SELECT * FROM abilityview where deleted_at is not null');
        return view('ability.deleted')->with('datas', $datas);
    }

    public function abilitySearch(Request $request) {
        $search = $request->search;

        $datas = DB::table('abilityview')
        ->where('AbilityID', 'like', "%$search%")
        ->orWhere('AbilityName', 'like', "%$search%")
        ->orWhere('AbilityType', 'like', "%$search%")
        ->orWhere('AgentName', 'like', "%$search%")
        ->get();

        return view('ability.index')->with('datas', $datas);
    }
}
