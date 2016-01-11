<?php

namespace App\Http\Controllers;

use App\Tender;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenderStoreRequest;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tender $tender)
    {
        $data = $tender->active()->get();

        return view('tender.index', [
            'tender' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenderStoreRequest $request)
    {
        $data = $request->all();

        $extension = $request->file('photo')->getClientOriginalExtension();

        $file_name = uniqid() . '.' . $extension;

        $request->file('photo')->move('uploads/', $file_name);

        $data['photo'] = $file_name;

        Tender::create($data);

        echo json_encode(['success']);
    }

    public function deleted(Tender $tender)
    {
        $data = $tender->deletedTender()->get();

        return view('tender.deleted', [
            'tender' => $data,
        ]);
    }

    public function restore($tender)
    {
        $tender->status = 'open';
        $tender->save();

        return redirect('/tender');
    }

    public function delete($tender)
    {
        $tender->status = 'delete';
        $tender->save();

        return redirect('/tender');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
