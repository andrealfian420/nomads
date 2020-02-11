<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve all data from TravelPackage model
        $items = TravelPackage::all();

        return view('pages.admin.travel-package.index', [
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
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        // retrive all data from submit button into $data
        $data = $request->all();

        // slug
        $data['slug'] = Str::slug($request->title); // output example : travel-nusa-dua-bali

        // insert the data into database
        TravelPackage::create($data);

        // redirect the user to travel package page after inserting the data
        return redirect()->route('travel-package.index');
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
        $item = TravelPackage::findOrFail($id);

        return view('pages.admin.travel-package.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        // retrive all data from submit button into $data
        $data = $request->all();

        // slug
        $data['slug'] = Str::slug($request->title); // output example : travel-nusa-dua-bali

        // find the data user wants to update
        $item = TravelPackage::findOrFail($id);

        // update the data to the database
        $item->update($data);

        // redirect the user to travel package page after inserting the data
        return redirect()->route('travel-package.index');
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
        $item = TravelPackage::findOrFail($id);

        // delete the data
        $item->delete();

        // redirect to travek package page
        return redirect()->route('travel-package.index');
    }
}
