<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return 'haha';

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addProjects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'desc'=> 'required',
            'photo'=>'image|nullable|max:1999',
            'link' => 'required'
        ]);
        
        if($request->hasFile('photo')){
            $fileName = pathinfo($request->file('photo')->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $fileName. '_'. time(). '.'.$extension;
            
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $project=new Project;
        $project->title = $request->input('title');
        $project->desc = $request->input('desc');
        $project->photo = $fileNameToStore;
        $project->link = $request->input('link');
        $project->save();

        return redirect('/projects');
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
        $project = Project::find($id);

        return $project->title;
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
        $project = Project::find($id);

        return view('editProject')->with('project', $project);
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
        $this->validate($request,[
            'title' => 'required',
            'desc'=> 'required',
            'photo'=>'image|nullable|max:1999',
            'link' => 'required'
        ]);
        
        if($request->hasFile('photo')){
            $fileName = pathinfo($request->file('photo')->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $fileName. '_'. time(). '.'.$extension;
            
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $project=Project::find($id);
        $project->title = $request->input('title');
        $project->desc = $request->input('desc');
        $project->photo = $fileNameToStore;
        $project->link = $request->input('link');
        $project->save();

        return redirect('/projects');

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

        $project = Project::find($id);
        $project->delete();

        return redirect('/galleries');
    }
}
