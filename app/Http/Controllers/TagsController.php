<?php

namespace App\Http\Controllers;

use App\models\Tag;
use App\Http\Requests\Tags\CreateTagsRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;

class TagsController extends Controller

{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
       return view('tags.index')->with('tags', Tag::all());
    }

    /**
    * show the form for creating a new resource
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        return view('tags.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store(CreateTagsRequest $request)
    {
        Tag::create([
            'name' => $request->name
        ]);

        session()->flash('succes', 'Tag created succesfully.');

        return redirect(route('tags.index'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int $id
    */

    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @return \Illuminate\Http\Response
    * @param int $id
    */

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */

    public function update(UpdateTagsRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);

        session()->flash('succes', 'tag updated');

        return redirect(route('tags.index'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */

    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('succes', 'Welloe tag');

        return redirect(route('tags.index'));
    }
}
