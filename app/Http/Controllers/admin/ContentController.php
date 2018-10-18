<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = \App\Content::all();
        $contentinfo = $content->toArray();

        return view('admin.pages.contentlist',['contentinfo' => $contentinfo]);
    }

    public function statuschange(Request $request)
    {
        $request_data = $request->All();
        $obj_cont = Content::find($request_data['contentid']);
        $obj_cont->status = $request_data['status'];
        $obj_cont->save(); 

        $request->session()->flash('message', 'Successfully changed the status of the Content!');
        return redirect('/admincontent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.contentadd');
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
        'title' => 'required|min:3',
        'description' => 'required',
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

        $content = Content::create(['title' => !empty($request->title) ? $request->title : '','description' => !empty($request->description) ? $request->description : '','images' => !empty($input['image']) ? $input['image'] : '0','status' => !empty($request->status) ? $request->status : 0]);
        
        
        $request->session()->flash('message', 'Successfully added the Content!');
        return redirect('/admincontent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id)->ToArray();
        return view('admin.pages.contentview',compact('content',$content));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id)->ToArray();
        /*print_r($Content);
        exit();*/
        return view('admin.pages.contentedit',compact('content',$content));
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
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $input = $request->all();
        /*print_r($request->status);
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

        $content = content::findOrFail($id);
        $content->title = !empty($request->title) ? $request->title : '';
        $content->description = !empty($request->description) ? $request->description : '';
        $content->images = !empty($input['image']) ? $input['image'] : '0';
        $content->status = !empty($request->status) ? $request->status : 0;
        $content->save();
        $request->session()->flash('message', 'Successfully modified the Content!');
        return redirect('admincontent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Content::find($id)->delete();
        $request->session()->flash('message', 'Successfully deleted the Content!');
        return redirect('admincontent');
    }
}
