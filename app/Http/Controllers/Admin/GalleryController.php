<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\TravelPackage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.create', [
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        // retrive all data from submit button into $data
        $data = $request->all();

        // upload the image
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        // Insert the data to db
        Gallery::create($data);

        // redirect the user to travel package page after inserting the data
        return redirect()->route('gallery.index');
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
        // find the data who has the id = $id, if not found then 404 will appear
        $item = Gallery::findOrFail($id);

        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit', [
            'item' => $item,
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        // retrive all data from submit button into $data
        $data = $request->all();

        // find the data user wants to update
        $item = Gallery::findOrFail($id);

        // Deleting the old image before uploading the new one
        $imagePath = explode('/', $item['image']);
        $oldImage = array_pop($imagePath);

        if (file_exists(public_path('storage/assets/gallery/' . $oldImage))) {
            unlink('storage/assets/gallery/' . $oldImage);
        }

        // upload the new image
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        // update the data to the database
        $item->update($data);

        // redirect the user to travel package page after inserting the data
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the data user wants to delete
        $item = Gallery::findOrFail($id);

        // delete the data
        $item->delete();

        // redirect to travek package page
        return redirect()->route('gallery.index');
    }
}
