<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Facades\Redirect;

class PositionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $position = Position::orderBy('created_at')->get();
        return view('backend.position',[
            'positions' => $position
        ]);
    }

    public function create(){
        return view('backend.positionAdd');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'salary' => 'required',
            'description' => 'required',
        ]);

        Position::create($request->all());

        return Redirect::to('/position')->with('success', 'Position Added Successfully!');
    }

    public function edit($id) {
        $data = Position::where(['id' => $id])->first();
        return view('backend.positionEdit', ["data" => $data]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'salary' => 'required',
            'description' => 'required',
        ]);

        $update = ['name' => $request->name, 'salary' => $request->salary, 'description' => $request->description];
        Position::where('id',$id)->update($update);

        return Redirect::route('position');
    }

    public function delete($id){
        Position::where('id', $id)->delete();
        return Redirect::to('/position')->with('success', 'Position Deleted Successfully!');
    }

}
