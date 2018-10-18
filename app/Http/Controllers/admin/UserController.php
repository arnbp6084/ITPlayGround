<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();
        $userinfo = $user->toArray();

        return view('admin.pages.userlist',['userinfo' => $userinfo]);   
    }

    public function statuschange(Request $request)
    {
        $request_data = $request->All();
        $obj_usr = User::find($request_data['userid']);
        $obj_usr->status = $request_data['status'];
        $obj_usr->save(); 

        $request->session()->flash('message', 'Successfully changed the status of the User!');
        return redirect('/adminuser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.useradd');
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
        'email' => 'required|min:3',
        'password' => 'required|min:3',
        'address' => 'required|min:3',
        'phone' => 'required|min:3',
        ]);
        /*print_r($request->all());
        exit();*/

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

        $user = User::create(['name' => !empty($request->name) ? $request->name : '','email' => !empty($request->email) ? $request->email : '','password' => !empty($input['password']) ? Hash::make($input['password']) : '0','address' => !empty($request->address) ? $request->address : 0,'phone' => !empty($request->phone) ? $request->phone : 0,'image' => !empty($request->image) ? $request->image : 0]);
        
        
        $request->session()->flash('message', 'Successfully added the User!');
        return redirect('/adminuser');
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

        $user = User::find($id)->ToArray();
        return view('admin.pages.userview',compact('user',$user));
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
        if (Auth::check()) {
            $user = User::find($id)->ToArray();
            /*print_r($uontent);
            exit();*/
            return view('admin.pages.useredit',compact('user',$user));
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
        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|min:6',
            'phone' => 'required|numeric|size:10',
        ]);
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

        $user = User::findOrFail($id);
        //print_r($user);
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

        $user->fill($input)->save();
        $request->session()->flash('message', 'Successfully updated the User!');
        return redirect('/adminuser');
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
        User::find($id)->delete();
        $request->session()->flash('message', 'Successfully deleted the User!');
        return redirect('adminuser');
    }
}
