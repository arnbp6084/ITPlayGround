<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = \App\Project::all();
        $projectinfo = $project->toArray();

        return view('admin.pages.projectlist',['projectinfo' => $projectinfo]);
    }

    public function statuschange(Request $request)
    {
        $request_data = $request->All();
        $obj_proj = Project::find($request_data['projectid']);
        $obj_proj->status = $request_data['status'];
        $obj_proj->save(); 

        $request->session()->flash('message', 'Successfully changed the status of the project!');
        return redirect('/adminproject');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.projectadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
        'name' => 'required|min:3',
        'description' => 'required',
        ]);

        $input = $request->all();
        /*print_r($input);
        exit();*/
        if(!empty($input['image'])){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);    

            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            /*print_r($input['image']);
            exit();*/
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $input['image']);
        }
        
        $project = Project::create(['name' => !empty($request->name) ? $request->name : '','description' => !empty($request->description) ? $request->description : '','images' => !empty($input['image']) ? $input['image'] : '0','status' => !empty($request->status) ? $request->status : 0]);
        $request->session()->flash('message', 'Successfully added the project!');
        return redirect('/adminproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id)->ToArray();
        return view('admin.pages.projectview',compact('project',$project));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id)->ToArray();
        /*print_r($project);
        exit();*/
        return view('admin.pages.projectedit',compact('project',$project));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
         //Validate
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $input = $request->all();
        /*print_r($input);
        exit();*/
        if(!empty($input['image'])){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);    

            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();
            /*print_r($input['image']);
            exit();*/
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $input['image']);
        }

        $project = Project::findOrFail($id);
        $project->name = !empty($request->name) ? $request->name : '';
        $project->description = !empty($request->description) ? $request->description : '';
        $project->images = !empty($input['image']) ? $input['image'] : '0';
        $project->status = !empty($request->status) ? $request->status : 0;
        $project->save();
        $request->session()->flash('message', 'Successfully modified the Project!');
        return redirect('adminproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Project::find($id)->delete();
        $request->session()->flash('message', 'Successfully deleted the Project!');
        return redirect('adminproject');
    }

    public function enroll()
    {

        $userproject = \App\User::join('user_project', function($join) {
          $join->on('users.id', '=', 'user_project.uid');
        })->select('users.id as usrid')->get()->unique('usrid');
        
        $userprojectdata=$userproject->ToArray();
        
        $userarrall=array();
            
        foreach ($userprojectdata as $key => $userdata) {
            //echo $userdata['usrid'].'</br>';
            $user = \App\User::find($userdata['usrid']);
            $userarr=$user->ToArray();
            $usrprjarr=array();
            
            $userarrall[$key]=$userarr;
            
            $userprojectall=$user->projects->ToArray();
            
            foreach ($userprojectall as $key1 => $value) {
                
                array_push($usrprjarr, $value['name']);
            }

            $userarrall[$key]['projs']=$usrprjarr;
            
        }
        /*print '<br>===========User Project details: <pre>';
        print_r($userarrall);
        print '</pre>===========<br>';

        exit();*/

        return view('admin.pages.enrolllist',compact('userarrall',$userarrall));
        
    }
}
