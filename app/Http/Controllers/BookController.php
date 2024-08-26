<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'publisher'=>'required',
            'isbn'=>'required',
            'category'=>'required',
            'sub_category'=>'required',
            'pages'=>'required',
            'image'=>'required',
            'added_by'=>'required',
        ]);
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Book::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Book = Book::find($id);
        $Book->update($request->all());
        return $Book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Book::destroy($id);
    }
    /**
     * Search for A book with name
     */
    public function search(string $name)
    {
        return Book::where('name', 'like' ,'%'.$name.'%')->get();
    }
}
