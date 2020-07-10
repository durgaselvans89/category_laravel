<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories =  Category::all();
        $category = new Category();
        $categories = $category->getAllCategories();
        return view('category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::all();
        return view('category.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->input); exit;
        $category = new Category();
        $data = $this->validate($request, [
            'name'=>'required|max:191',
            'sortorder'=> 'required',
        ]);
       
        $catStatus = $category->saveCategory($request);
        if ($catStatus) {
            $request->session()->flash('success', 'Category successfully added');
        } else {
            $request->session()->flash('error', 'Category not saved');
        }
        return redirect('category')->with('success', 'Category successfully added!!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories =  Category::all();
        $category =  Category::where('id', $id)->first();
        return view('category.edit', ['categories' => $categories, 'category' => $category]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories =  Category::all();
        $category =  Category::where('id', $id)->first();
        return view('category.edit', ['categories' => $categories, 'category' => $category]);   
        
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
        $category = new Category();
        $data = $this->validate($request, [
            'name'=>'required|max:191',
            'sortorder'=> 'required',
        ]);
       
        $catStatus = $category->updateCategory($request, $id);
        if ($catStatus) {
            $request->session()->flash('success', 'Category successfully updated');
        } else {
            $request->session()->flash('error', 'Category not saved');
        }
        return redirect('category')->with('success', 'Category successfully updated!!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $category = new Category();
        $catStatus = $category->removeCategory($request->checkbox);

        if ($catStatus) {
            $request->session()->flash('success', 'Category successfully Removed.');
        } else {
            $request->session()->flash('error', 'Could not able to remove Categories.');
        }
        return redirect('category');
    }
}
