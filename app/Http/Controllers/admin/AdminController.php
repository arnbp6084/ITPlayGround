<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

use App\Project;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
Use Redirect;
use Illuminate\Support\MessageBag;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        /*echo 'kkk';
        exit();*/
        //return view('home');
        //$project = \App\Project::all();
            //$projectinfo = $project->toArray();
            /*print 'oooo<pre>';
                print_r($project);
            print '</pre>';*/
        /*

        print '<pre>';
        print_r($userInfo);
        print '</pre>';
        exit();*/
        if (Auth::check()) {
            $userInfo = Auth::user()->toArray();
            $request->session()->put('status', 'User logging was successful!');
            $request->session()->put('id', $userInfo['id']);
            $request->session()->put('name', $userInfo['name']);
            $request->session()->put('email', $userInfo['email']);
            $request->session()->put('adminimage', $userInfo['image']);
            if($userInfo['id'] == 1){
                return redirect('/adminhome');    
            }else{
                return view('admin.pages.projectlist');
            }
        }else{
            $request->session()->forget('status');
            return view('admin.pages.login');
        }
        
        
    }

    public function gethome()
    {
        //return view('home');
        $project = \App\Project::all();
        $projectinfo = $project->toArray();

        $contentall = \App\Content::all();
        $contentallinfo = $contentall->toArray();

        $userall = \App\User::all();
        $userallinfo = $userall->toArray();
        /*print 'kkk<pre>';
            print_r($projectinfo);
        print '</pre>';*/
        if (Auth::check()) {
            
            $userInfo = Auth::user()->toArray();
            
            return view('admin.pages.home', ['userInfo' => $userInfo,'userallinfo' => $userallinfo,'projectinfo' => $projectinfo, 'contentallinfo' => $contentallinfo]);
        }else{
            return Redirect::to('manage');
            
        }
        
    }


    public function showLogin() {
        // Form View
        return view('login');
    }
 
    public function doLogout() {
        Auth::logout('admin'); // logging out user
        return Redirect::to('/manage'); // redirection to login screen
    }
 
    public function doLogin(Request $request) {
        $errors = new MessageBag;
        // Creating Rules for Email and Password
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:8'
            );
            // password has to be greater than 3 characters and can only be alphanumeric and);
            // checking all field
            $validator = Validator::make(Input::all() , $rules);
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                
                return Redirect::to('manage')->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            }else{
                
                // create our user data for the authentication
                $userdata = array(
                    'email' => Input::get('email') ,
                    'password' => Input::get('password')
                );
                // attempt to do the login
                if (Auth::attempt($userdata)) {
                    //echo '1';exit();
                    // validation successful
                    // do whatever you want on success
                    if (Auth::check()) {
                        $userInfo = Auth::user()->toArray();
                        $request->session()->put('status', 'User logging was successful!');
                        $request->session()->put('id', $userInfo['id']);
                        $request->session()->put('name', $userInfo['name']);
                        $request->session()->put('email', $userInfo['email']);
                        if($userInfo['id'] == 1){
                            return redirect('/adminhome')->with('alert-success', 'You are now logged in.');    
                        }else{
                            return view('admin.pages.adminerror');
                        }
                    }else{
                        $request->session()->forget('status');
                        return view('admin.pages.login');
                    }


                }else{
                    //echo '2';exit();
                    // validation not successful, send back to form
                    $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
                    return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
                    
                }
            }
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

    public function contactus()
    {

        $usercontact = \App\User::join('contactus', function($join) {
          $join->on('users.id', '=', 'contactus.uid');
        })->select('users.id as usrid')->get()->unique('usrid');
        
        $usercontactdata=$usercontact->ToArray();
        
        $userarrall=array();
            
        foreach ($usercontactdata as $key => $userdata) {
            //echo $userdata['usrid'].'</br>';
            $user = \App\User::find($userdata['usrid']);
            $userarr=$user->ToArray();
            
            $usrcontarr=array();
            
            $userarrall[$key]=$userarr;
            
            $usercontactall=$user->contacts->ToArray();
            
            foreach ($usercontactall as $key1 => $value) {
                
                array_push($usrcontarr, $value['message']);
            }

            $userarrall[$key]['msgs']=$usrcontarr;
            
        }
        /*print '<br>===========User Project details: <pre>';
        print_r($userarrall);
        print '</pre>===========<br>';

        exit();*/

        return view('admin.pages.contactmessage',compact('userarrall',$userarrall));
    }
}
