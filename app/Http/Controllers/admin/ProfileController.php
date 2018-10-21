<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Profile;
use Auth;
use Session;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*public function edit(User $user)
    {
        return view('pages.profile',compact('user',$user));
        
    }*/

    public function edit($id)
    {
        $project = \App\Project::all();
        $projectinfo = $project->toArray();

        $contentall = \App\Content::all();
        $contentallinfo = $contentall->toArray();

        if (Auth::check()) {
            $user = User::find($id);
            /*print '<pre>';
            print_r($user->ToArray());
            print '<pre>';
            exit();*/
            //return view('pages.profile',compact('user'));
            //$user = User::find($id);
            return view('admin.pages.profile',['user' => $user,'projectinfo' => $projectinfo, 'contentallinfo' => $contentallinfo]);
        }else{
            return redirect('/manage');
        }
        
    }

    public function passwordchange(Request $request)
    {
         
        $request_data = $request->All();
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
        //echo '1';

        return response()->json(['success'=>'Password is successfully changed']);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id,Request $request)
    {

        $profile = User::findOrFail($id);
        //print_r($profile);
        //exit();
        /*$this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);*/

        $input = $request->all();

        /*print_r($input);
        exit();*/

        //echo 'ggtdgdfgdfg';
        //exit();
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

        //$this->postImage->add($input);
        //print_r($input);

        $profile->fill($input)->save();
        Session::put('status', 'Profile successfully updated!');

        return redirect()->back();
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
