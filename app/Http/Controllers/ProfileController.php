<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //$user = User::find($id);
        /*print '<pre>';
        print_r($user->ToArray());
        print '<pre>';
        exit();*/

        //return view('pages.profile',compact('user'));
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
            return view('pages.profile',['user' => $user,'projectinfo' => $projectinfo, 'contentallinfo' => $contentallinfo]);
        }else{
            return redirect('/home');
        }
        
    }

    public function passwordchange(Request $request)
    {
         //Validate
        /*print '<pre>';
        print_r($request->name);
        print '</pre>';
        exit();*/
        /*$profile = new User();
        $profile->password = $request->passwrd;
        $grocery->type = $request->type;
        $grocery->price = $request->price;

        $profile->save();*/

        $request_data = $request->All();
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
        //echo '1';

        return response()->json(['success'=>'Password is successfully changed']);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateee(Request $request, User $user)
    {
         //Validate
        /*print '<pre>';
        print_r($request->name);
        print '</pre>';
        exit();*/
        $request->validate([
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
        return redirect('profile');
    }

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
        /*




        $data=$request->all();
        Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|min:6',
            'phone' => 'required|numeric|size:10',
        ]);
        

        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);
        Session::put('status', 'User registration was successful!'); 
        event(new Registered($user));
        $this->guard()->login($user);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());        */
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
