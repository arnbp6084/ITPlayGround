<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Project;
use App\Contact;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
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
        $userInfo = Auth::user()->toArray();
        /*print '<pre>';
        print_r($userInfo);
        print '</pre>';
        exit();*/
        if (Auth::check()) {
            $request->session()->put('status', 'User logging was successful!');
            $request->session()->put('id', $userInfo['id']);
            $request->session()->put('name', $userInfo['name']);
            $request->session()->put('email', $userInfo['email']);
        }else{
            $request->session()->forget('status');
        }
        return redirect('/home');
    }

    public function gethome()
    {
        //return view('home');
        $project = \App\Project::all()->where('status','=',1);
        $projectinfo = $project->toArray();

        $contentall = \App\Content::all()->where('status','=',1);
        $contentallinfo = $contentall->toArray();
        /*print 'kkk<pre>';
            print_r($projectinfo);
        print '</pre>';*/
        if (Auth::check()) {
            
            $userInfo = Auth::user()->toArray();
            
            return view('pages.home', ['userInfo' => $userInfo,'projectinfo' => $projectinfo, 'contentallinfo' => $contentallinfo]);
        }else{
            
            return view('pages.home', ['projectinfo' => $projectinfo, 'contentallinfo' => $contentallinfo]);    
        }
        
    }

    public function contactus(Request $request)
    {
        $request_data = $request->All();
        //print_r($request_data['usid']);exit();
        if(empty($request->usid)){
            $request->session()->flash('status', 'Please log in to contact us!');
        }else{
            $contact = Contact::create(['uid' => !empty($request->usid) ? $request->usid : '','title' => !empty($request->title) ? $request->title : '','message' => !empty($request->message) ? $request->message : '0']);
            $request->session()->flash('status', 'Successfully posted your message!');
        }
        return redirect('/home');
    }

}
