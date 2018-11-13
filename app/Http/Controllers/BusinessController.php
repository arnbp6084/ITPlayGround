<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BusinessController extends Controller
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
        $userInfo = Auth::user()->toArray();
        /*print '<pre>';
        print_r($userInfo);
        print '</pre>';*/
        //exit();
        return view('pages.business',['user' => $userInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*print '<pre>';
        print_r($request->toArray());
        print '</pre>';
        exit();*/

        //Validate
        $request->validate([
        'title' => 'required|min:3',
        'description' => 'required',
        ]);

        $input = $request->all();
        /*print_r($input);
        exit();*/
        
        
        $business = \App\Business::create(['uid' => !empty($request->uid) ? $request->uid : '0','pid' => !empty($request->pid) ? $request->pid : '0','title' => !empty($request->title) ? $request->title : '','description' => !empty($request->description) ? $request->description : '']);
        $request->session()->flash('status', 'Successfully posted your proposal!');
        return redirect('business/' . $request->pid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userInfo = Auth::user()->toArray();
        /*print '<pre>';
        print_r($userInfo);
        print '</pre>';*/
        //exit();
        return view('pages.business',['user' => $userInfo,'pid' => $id]);
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
}
