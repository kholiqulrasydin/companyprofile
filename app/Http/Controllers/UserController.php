<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('backend.user', ['users' => $users]);
    }

    public function add(){

        $position = Position::all();
        return view('auth.register', ['position' => $position]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:16'],
            'photo' => ['required'],
            'position' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


        /**
         * Create a new user instance after a valid registration.
         *
//         * @param array $data
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function create(Request $request)
        {
            $img = $request->file('photo');
            $fileName = Str::random(50);
            $extension = $img->getClientOriginalExtension();
            $fix = $fileName.".".$extension;
            $img->move('images',$fix);
            $user = new User();
            $user->name = $request->name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->position = $request->position;
            $user->photo = $fix;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('user')->with('success', 'User Added Successfully!');


        }

        public function delete($id){
            User::where('id', $id)->delete();

            return redirect()->route('user')->with('success', 'User Succesfully Deleted!');
        }


}
