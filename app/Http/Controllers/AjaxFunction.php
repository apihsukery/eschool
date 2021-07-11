<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;

class AjaxFunction extends Controller
{
    // check IC already use or not
    public function checkIC(Request $request){
        $user = DB::table('users')->where('ic', $request->ic)->first();
        if($user)
        {
            return response()->json(['exist'=>"IC number already registered",'flag'=>'1']);
        }
        else{
            return response()->json(['exist'=>"IC number not registered",'flag'=>'0']);

        }
    }

}
