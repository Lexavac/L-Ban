<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Book;
use App\Models\Hero;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\Admin\BookRequest;
use App\Http\Controllers\Traits\ImageUploadingTrait;

class HeroController extends Controller
{
    use ImageUploadingTrait;

    public function index()
    {
        $heros = Hero::all();
        return view('dashboard.hero.index', compact('heros'));
    }

    public function create()
    {
        $heros = Hero::all();

        return view ('dashboard.hero.create', compact('heros'));
    }

    public function store(Request $request)
    {
        $heros = Hero::create($request->all());

        foreach ($request->input('media', []) as $file) {
            $heros->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
        }

        return redirect('admin/')->with('message', 'Success Created !');
    }

    public function edit(Request $request, $id)
    {
        $heros = Hero::findOrFail($id);
        return view('dashboard.hero.edit', compact('heros'));
    }

    public function update(Request $request, $id)
    {
        $heros = Hero::findOrFail($id);

        $heros->update($request->all());

        if (count($heros->media) > 0) {
            foreach ($heros->media as $media) {
                if (!in_array($media->file_name, $request->input('media', []))) {
                    $media->delete();
                }
            }
        }

        $media = $heros->media->pluck('file_name')->toArray();

        foreach ($request->input('media', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $heros->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
            }
        }

        return redirect()->route('hero')->with([
            'message' => 'Success Updated !',
            'type' => 'info'
        ]);

    }

    public function destroy($id)
    {
        Schema::disableForeignKeyConstraints();
        $heros = Hero::findOrFail($id);
        $heros->delete();
        Schema::enableForeignKeyConstraints();

        return redirect('admin/book')->with('message', 'Success Delete !');
    }


}
