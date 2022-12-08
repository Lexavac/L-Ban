<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Controllers\Traits\ImageUploading;
use App\Http\Controllers\Traits\ImageUploadingTrait;

class CategoryController extends Controller
{
    use ImageUploadingTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('books')->get();
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('category_id')->pluck('name', 'id');
        return view('dashboard.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Schema::disableForeignKeyConstraints();

        $category = Category::create($request->all());

        Schema::enableForeignKeyConstraints();
        
        return redirect()->route('category')->with([
            'message' => 'Succeess Created !',
            'type' => 'success'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
         $categories = Category::with('books')->findOrFail($id);
         $books = Book::pluck('category_id', 'id');
        // $categories = Category::whereNull('category_id')->pluck('name', 'id');
        return view('dashboard.category.edit', compact('category', 'categories', 'books'));
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
        Schema::disableForeignKeyConstraints();

        $category = Category::findOrFail($id);
        $category -> update($request->all());

        Schema::enableForeignKeyConstraints();

        return redirect()->route('category')->with([
            'message' => 'Success Updated !',
            'type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        Schema::disableForeignKeyConstraints();
        $category = Category::findOrFail($id);
        $category->delete();
        Schema::enableForeignKeyConstraints();

        return redirect()->back()->with([
            'message' => 'Delete successfully!',
            'type' =>  'danger'
        ]);
    }
}
