<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;

class AjaxFunction extends Controller
{
    // check IC and Email already use or not
    public function checkRecord(Request $request){
        $ic = DB::table('users')->where('ic', $request->ic)->first();
        $email = DB::table('users')->where('email', $request->email)->first();

        $record=array("ic"=>"0","email"=>"0");

        if($ic)
        {
            $record["ic"] = "1";
        }
        if($email)
        {
            $record["email"] = "1";
        }
        return response()->json($record);
    }

}
