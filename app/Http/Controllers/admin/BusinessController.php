<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    public function business()
    {

        $userproject = \App\User::join('business', function($join) {
          $join->on('users.id', '=', 'business.uid');
        })->select('users.id as usrid')->get()->unique('usrid');
        
        $userprojectdata=$userproject->ToArray();

        /*print '<pre>';
        print_r($userprojectdata);
        print '</pre>';
        exit();*/
        
        $userarrall=array();
            
        foreach ($userprojectdata as $key => $userdata) {
            //echo $userdata['usrid'].'</br>';
            $user = \App\User::find($userdata['usrid']);
            $userarr=$user->ToArray();
            $usrprjarr=array();
            
            $userarrall[$key]=$userarr;
            
            $userprojectall=$user->businessprojects->ToArray();
            
            foreach ($userprojectall as $key1 => $value) {
                
                array_push($usrprjarr, $value['name']);
            }

            $userarrall[$key]['projs']=$usrprjarr;
            $userbusinessdesc = \App\User::join('business', function($join) {
          $join->on('users.id', '=', 'business.uid');
        })->where('business.uid', $userdata['usrid'])->select('business.description')->get()->ToArray();
            $userarrall[$key]['description']=$userbusinessdesc;
            
        }
        /*print '<br>===========User Project details: <pre>';
        print_r($userarrall);
        print '</pre>===========<br>';

        exit();*/

        return view('admin.pages.businesslist',compact('userarrall',$userarrall));
        
    }
}
