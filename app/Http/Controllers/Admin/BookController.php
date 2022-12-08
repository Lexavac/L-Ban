<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Book;
use App\Models\Test;
use App\Models\Category;
use App\Models\Leanguage;
use App\Models\publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BookRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\payment\TripayController;
use App\Http\Controllers\Traits\ImageUploadingTrait;

class BookController extends Controller
{
    use ImageUploadingTrait;


    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {


        $books = Book::all();
        return view('dashboard.Books.indexs', compact('books'));
    }

    // CREATE
    public function create()
    {
        $books = Book::all();
        $categories = Category::pluck('name', 'id');
        $publishers = Publisher::pluck('name', 'id');
        $leanguages = Leanguage::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        return view ('dashboard.Books.createx', compact('categories', 'tags', 'books', 'publishers', 'leanguages'));
    }

    public function store(Request $request)
    {
        $books = Book::create($request->all());
        // $tests = Test::create($request->all());
        // $tests->tags()->attach($books);
        $books->tags()->attach($request->input('tags', [] ));



        foreach ($request->input('gallery', []) as $file) {
            $books->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        Alert::info('Info Title', 'Success Create Data');

        return redirect('admin/book')->with('message', 'Success Created !');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('dashboard.Books.show', compact('book'));
    }

    // UPDATE

    public function edit(Request $request, $id)
    {
        $books = Book::with('category')->findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $publishers = publisher::pluck('name', 'id');
        $leanguages = Leanguage::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('dashboard.Books.edit', compact('books','categories', 'tags', 'publishers', 'leanguages'));
    }

    public function update(Request $request, $id)
    {
        $books = Book::findOrFail($id);

        $books->update($request->all());

        if (count($books->gallery) > 0) {
            foreach ($books->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $books->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $books->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }
        Alert::info('Info Title', 'Success Update Data');
        return redirect()->route('book')->with([
            'message' => 'Success Updated !',
            'type' => 'info'
        ]);

    }

    public function checkout(Book $books, $id)
    {
        $books = Book::findOrFail($id);

        $tripay = new TripayController();

        $ps = $tripay->pay();

        return view('dashboard.checkout.ch', compact('books', 'ps'));
    }



    // DELETE

    public function destroy(Book $book, $id)
    {


        $book = Book::findOrFail($id);
        $files = $book->getMedia('gallery')->first();
        $files->move($book, 'trash');

        $book->delete();


        Alert::info('Info Title', 'Success Move Data To Trash');
        return redirect('admin/book')->with('message', 'Success Delete !');
    }

    public function trash()
    {
        $books = Book::onlyTrashed()->get();

        return view('dashboard.Books.trash', compact('books'));
    }

    public function restore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);

        $file = $book->getMedia('trash')->first();
        $file->move($book, 'gallery');

        $book->restore();

        return redirect('admin/book')->with('message', 'Success Restored !');

    }

    public function force($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->getMedia('trash');
        $book->clearMediaCollection('trash');
        Schema::disableForeignKeyConstraints();
        $book->forceDelete();
        Schema::enableForeignKeyConstraints();

        return redirect('admin/book')->with('message', 'Permanently Deleted Success !');

    }

}
