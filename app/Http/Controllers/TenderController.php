<?php

namespace App\Http\Controllers;

use App\Tender;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenderStoreRequest;
use App\Http\Requests\TenderUpdateRequest;

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
            'filter' => 'all',
        ]);
    }

    public function filter($filter, Tender $tender)
    {

        $data = $tender->filter($filter);

        return view('tender.index', [
            'tender' => $data,
            'filter' => $filter,
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

    /**
     * View 'deleted' tenders
     *
     * @param Tender $tender
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deleted(Tender $tender)
    {
        $data = $tender->deletedTender()->get();

        return view('tender.deleted', [
            'tender' => $data,
        ]);
    }

    /**
     * Change status to 'open'
     *
     * @param $tender
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($tender)
    {
        $tender->status = 'open';
        $tender->save();

        return redirect('/tender');
    }

    /**
     * Change status to 'delete'
     *
     * @param $tender
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
    public function show($tender)
    {
        return view('tender.show', [
           'tender' => $tender,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tender)
    {
        return view('tender.edit', [
            'tender' => $tender,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TenderUpdateRequest $request, $tender)
    {
        $data = $request->all();

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();

            $file_name = uniqid() . '.' . $extension;

            $request->file('photo')->move('uploads/', $file_name);

            $data['photo'] = $file_name;
        }else{
            $data['photo'] = $tender->photo;
        }

        $tender->update($data);

        echo json_encode(['success']);

    }

}
