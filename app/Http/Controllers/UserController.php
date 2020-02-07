<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getUser = DB::table('users');
        if(!empty($request->from) && !empty($request->to) && !empty($request->sort))
            {
                $getUser->whereBetween('created_at', [$request->from, $request->to, $request->sort]);
            }
        if(!empty($request->sort)) {
            $getUser->orderBy('created_at', 'desc')->get();
        }
        $user = $getUser->get();

        return view('user', compact( 'user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            $validator = Validator::make($input,
                [
                    'user_name' => 'required|max:255',
                    'name' => 'required|unique:users|max:80',
                    'email' => 'required|email|unique:users|max:255',
                    'text' => 'required|min:20|'
                ]);

            if ($validator->fails()) {
                return redirect()->route('create')->withErrors($validator)->withInput();
            }
        }

        $user = new User();
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->text = $request->text;
        $user->ip = $request->ip();
        if($request->file != null)
            {
                $file = $request->file;
                $path_parts = pathinfo($request->file('file')->getClientOriginalName());
                $fName = date('d-m-Y_H-i-s') . '.' . $path_parts['extension'];
                $file->move(public_path() . '\upload', $fName);
                $user->file = $fName;
            }
        $user->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }
}
