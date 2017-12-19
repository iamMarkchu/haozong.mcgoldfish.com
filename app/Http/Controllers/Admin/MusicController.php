<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MusicRequest;
use App\Models\Music;

class MusicController extends Controller
{
    protected $music;
    public function __construct(Music $music)
    {
        $this->music = $music;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $music = new Music();
        $name = $request->input('name');
        if(!empty($name))
        {
            $music = $music->where('name', 'like', $name.'%');
        }
        return $music->orderBy('created_at', 'desc')->paginate($request->input('limit'));
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
    public function store(MusicRequest $request)
    {
        $data = $request->all();
        $this->music->fill($data);
        $this->music->save();
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->music->find($id);
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
    public function update(MusicRequest $request, $id)
    {
        $data = $request->only(['name', 'lyrics', 'image', 'music_file', 'author']);
        $this->music->findOrFail($id)->fill($data)->save();
        return response()->json(['message' => 'success']);
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
