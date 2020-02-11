<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with([
            'details', 'travel_package', 'user'
        ])->get();

        return view('pages.admin.transaction.index', [
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        // retrive all data from submit button into $data
        $data = $request->all();

        // slug
        $data['slug'] = Str::slug($request->title); // output example : travel-nusa-dua-bali

        // insert the data into database
        Transaction::create($data);

        // redirect the user to travel package page after inserting the data
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail', [
            'item' => $item
        ]);
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
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        // retrive all data from submit button into $data
        $data = $request->all();

        // slug
        $data['slug'] = Str::slug($request->title); // output example : travel-nusa-dua-bali

        // find the data user wants to update
        $item = Transaction::findOrFail($id);

        // update the data to the database
        $item->update($data);

        // redirect the user to travel package page after inserting the data
        return redirect()->route('transaction.index');
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
        $item = Transaction::findOrFail($id);

        // delete the data
        $item->delete();

        // redirect to travek package page
        return redirect()->route('transaction.index');
    }
}
