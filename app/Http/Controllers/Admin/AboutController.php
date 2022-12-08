<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Book;
use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\Admin\BookRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Traits\ImageUploadingTrait;

class AboutController extends Controller
{
    use ImageUploadingTrait;

    public function index()
    {
        $abouts = About::all();
        return view('dashboard.about.index', compact('abouts'));
    }

    public function create()
    {
        $abouts = About::all();

        return view ('dashboard.about.create', compact('abouts'));
    }
    public function store(Request $request)
    {
        $books = About::create($request->all());

        foreach ($request->input('gallery', []) as $file) {
            $books->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        Alert::info('Info Title', 'Success Create Data');

        return redirect('admin/about')->with('message', 'Success Created !');
    }

    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('dashboard.about.show', compact('about'));
    }

    public function edit(Request $request, $id)
    {
        $abouts = About::findOrFail($id);
        return view('dashboard.about.edit', compact('abouts'));
    }

    public function update(Request $request, $id)
    {
        $books = About::findOrFail($id);

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
    public function destroy($id)
    {
        Schema::disableForeignKeyConstraints();
        $abouts = About::findOrFail($id);
        $abouts->delete();
        Schema::enableForeignKeyConstraints();


        Alert::info('Info Title', 'Success Move Data To Trash');
        return redirect('admin/book')->with('message', 'Success Delete !');
    }


}
