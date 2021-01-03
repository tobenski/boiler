<?php
// TODO: Create actions to restore softdeleted Pages
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumImageRequest;
use App\Http\Requests\PageImageRequest;
use App\Http\Requests\PageRequest;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::first();
        return view('admin.pages.edit', ['page' => $page, 'pages' => Page::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('admin.pages.create', ['page' => $page, 'pages' => Page::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = Page::Create([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'keywords' => $request->keywords,
            'header_1' => $request->header_1,
            'header_2' => $request->header_2,
            'content_1' => $request->content_1,
            'content_2' => $request->content_2,
            'content_3' => $request->content_3,
            'content_4' => $request->content_4,
            'notes' => $request->notes,
            'online' => $request->boolean('online'),
            'order' => $request->order,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->to(route('admin.page.edit', $page->id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::where('id', $id)->first();
        return view('admin.pages.edit', ['page' => $page, 'pages' => Page::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page = Page::where('id', $id)->first();

        $page->update([
            'name' => $request->name,
            'slug' => $request->slug ? $request->slug : '',
            'description' => $request->description,
            'short_description' => $request->short_description,
            'keywords' => $request->keywords,
            'header_1' => $request->header_1,
            'header_2' => $request->header_2,
            'content_1' => $request->content_1,
            'content_2' => $request->content_2,
            'content_3' => $request->content_3,
            'content_4' => $request->content_4,
            'notes' => $request->notes,
            'online' => $request->boolean('online'),
            'order' => $request->order,
            'parent_id' => $request->parent_id,
        ]);

        return back();

    }

    public function storeImage(PageImageRequest $request, $id)
    {
        $page = Page::where('id', $id)->first();
        $page->addFromMediaLibraryRequest($request->pagePicture)
             ->toMediaCollection('page');

        return back();
    }

    public function storeAlbum(AlbumImageRequest $request, $id)
    {
        $page = Page::where('id', $id)->first();
        $page->addFromMediaLibraryRequest($request->album)
             ->toMediaCollection('album');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();
        $page->delete();
    }
}
