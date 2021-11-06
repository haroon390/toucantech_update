<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\OUser;

class UserController extends Controller
{
    //
    public function create()
    {
        $active = "usercreate";

        return view('user.create', compact('active'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:125',
            'email' => 'required|string|email|max:100',
            'school' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);

        } else {
            OUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'school' => json_encode($request->school)
            ]);
        }

        return redirect()->route('user.list');
    }

    public function list()
    {
        $active = "userlist";
        $datas = OUser::all();
        
        for($i = 0; $i < count($datas); $i ++) {
            $datas[$i]->school = json_decode($datas[$i]->school);
        }

        return view('user.list', compact('datas', 'active'));
    }

    public function getList(Request $request)
    {
        $datas = OUser::all();
        $get_data = [];

        for($i = 0; $i < count($datas); $i ++) {
            $datas[$i]->school = json_decode($datas[$i]->school);
            foreach($datas[$i]->school as $each) {
                if($each == $request->name) array_push($get_data, $datas[$i]);
            }
        }

        return json_encode($get_data);
    }
}
