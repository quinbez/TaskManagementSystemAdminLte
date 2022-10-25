<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Exception;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('category.allCategories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        try{
                $updated =  Category::create($request->all());
                if($updated){
                return redirect('category/index')->with('success', 'Category has been created successfully');
                }else{
                return redirect('category/index')->with('error', 'Category has not been created successfully');
            }
            }catch(Exception $ex){
                return redirect('category/index')->with('error', 'error occured');
            }
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
        $categories = Category::findOrFail($id);
        return view('category.editCategory', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
        $id = $request->categoryId;
        $categories = Category::findOrFail($id);
        $categoryUpdate =[
            'type' => $request->type,
        ];
        // $input = $request->all();
        // dd($input);
      $updated =  $categories->update($categoryUpdate);
      if($updated){
        return redirect('category/index')->with('success', 'Category has been updated successfully');
    } else{
        return redirect('category/index')->with('error', 'Category has not been updated successfully');
    }
}catch(Exception $ex){
    return redirect('category/index')->with('error', 'error occured');
}
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/category/index');
    }
}
