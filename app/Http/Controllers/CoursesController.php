<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = \App\Project::find($id);
        $projectinfobyid = $project->ToArray();

        $project = \App\Project::all()->where('status','=',1);
        $projectinfo = $project->toArray();

        $contentall = \App\Content::all()->where('status','=',1);
        $contentallinfo = $contentall->toArray();

        return view('pages.course',['projectinfobyid' => $projectinfobyid, 'projectinfo' => $projectinfo, 'contentallinfo' => $contentallinfo]);
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

    public function enrollyou(Request $request)
    {
         //Validate
        /*print '<pre>';
        print_r($request->name);
        print '</pre>';
        exit();*/
        $request_data = $request->All();
        $userprojectexists = \App\Userproject::where([['pid', '=', $request_data['pid']],['uid', '=', $request_data['usrid']]])->first();
        if ($userprojectexists === null) {
            $userproject = new \App\Userproject;
            $userproject->pid = $request_data['pid'];
            $userproject->uid = Auth::User()->id;
            $userproject->save(); 
            //echo '1';
            return response()->json(['success'=>'You have been enrolled successfully.']);
        }else{
            return response()->json(['success'=>'You have already been enrolled.']);
        }
        
        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|min:6',
            'phone' => 'required|numeric|size:10',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        $request->session()->flash('status', 'Successfully modified the task!');
        return redirect('profile');*/
    }
}
