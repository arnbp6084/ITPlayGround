<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = \App\Slider::all();
        $sliderinfo = $slider->toArray();

        return view('admin.pages.sliderlist',['sliderinfo' => $sliderinfo]);
    }

    public function statuschange(Request $request)
    {
        $request_data = $request->All();
        $obj_proj = Slider::find($request_data['sliderid']);
        $obj_proj->status = $request_data['status'];
        $obj_proj->save(); 

        $request->session()->flash('message', 'Successfully changed the status of the slider!');
        return redirect('/adminslider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$projectlists=\App\Project::all()->where('status', '=', 1)->toArray();
    	/*print '<pre>';
    	print_r($projectlists);
    	print '</pre>';
    	exit();*/
        return view('admin.pages.slideradd',['projectlists' => $projectlists]);
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
        'text1' => 'required',
        'text2' => 'required',
        'image' => 'required',
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
        
        $slider = Slider::create(['pid' => !empty($request->pid) ? $request->pid : '','title' => !empty($request->title) ? $request->title : '','text1' => !empty($request->text1) ? $request->text1 : '','text2' => !empty($request->text2) ? $request->text2 : '','image' => !empty($input['image']) ? $input['image'] : '0','status' => !empty($request->status) ? $request->status : 0]);
        $request->session()->flash('message', 'Successfully added the slider!');
        return redirect('/adminslider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id)->ToArray();
        return view('admin.pages.sliderview',compact('slider',$slider));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id)->ToArray();
        $projectlists=\App\Project::all()->where('status', '=', 1)->toArray();
        /*print_r($slider);
        exit();*/
        return view('admin.pages.slideredit',['slider' => $slider, 'projectlists' => $projectlists]);
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
	        'text1' => 'required',
	        'text2' => 'required',
	        
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

        $slider = Slider::findOrFail($id);
        $slider->pid = !empty($request->pid) ? $request->pid : '0';
        $slider->title = !empty($request->title) ? $request->title : '';
        $slider->text1 = !empty($request->text1) ? $request->text1 : '';
        $slider->text2 = !empty($request->text2) ? $request->text2 : '';
        if(!empty($input['image'])){
        	$slider->image = !empty($input['image']) ? $input['image'] : '0';
    	}
        $slider->status = !empty($request->status) ? $request->status : 0;
        $slider->save();
        $request->session()->flash('message', 'Successfully modified the slider!');
        return redirect('adminslider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Slider::find($id)->delete();
        $request->session()->flash('message', 'Successfully deleted the slider!');
        return redirect('adminslider');
    }
    
}
