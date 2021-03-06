<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

use Yajra\DataTables\DataTables;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorie=Categorie::all();
    //   return view('html/categorie',compact('categorie'));

    return view('html/allcategorie');
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
            'category_name'=>$request['Categorie_name'],
            'category_status'=>$request['status'],
        ];
       
        
          Categorie::create($data);
          return redirect('allcategorie');
        
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
        $categorie=Categorie::find($id);
        return $categorie;
   
   
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
        $categorie=Categorie::find($id);
        $categorie->category_name=$request['categorie_name'];
        $categorie->category_status=$request['status'];
        $categorie->update();
        return $categorie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie::destroy($id);
    }

        //Read All data by Json format
    public function AllCategorie()
    {
   $categorie=Categorie::all(); 
       return Datatables::of($categorie)
       ->addColumn('action',function($categorie){

        return '<a onclick"showData('.$categorie->id.')" class="btn btn-sm btn-success">Show</a>'.' '.
      
        '<a onclick="editData('.$categorie->id.')" class="btn btn-sm btn-warning">Edit</a>'.' '.
        '<a onclick="deleteData('.$categorie->id.')" class="btn btn-sm btn-danger">Delete</a>';
       })->make(true);

    }
}
