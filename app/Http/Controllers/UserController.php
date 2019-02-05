<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('html/user');
        // return view('html/user',compact('user'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],

        ];
        return User::create($data);
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
        $user=User::find($id);
        return $user;
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
        $user=User::find($id);

       $user->name=$request['name'];
       $user->email=$request['email'];
       $user->password=$request['password'];
        $user->update();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
    }


    public function User_json()
    {
        $user=User::all();
        return DataTables::of($user)
        ->addColumn('action',function($user){
            return
            '<a onclick="showData('.$user->id.')" class="btn btn-sm btn-success">Show</a>'.' '.
            '<a onclick="editForm('.$user->id.')" class="btn btn-sm btn-info">Edit</a>'.' '.
            '<a onclick="deleteData('.$user->id.')" class="btn btn-sm btn-danger">Delete</a>'
            ;
        })->make(true);
        // return Datatables::of(User::query())->make(true);
    }
}
