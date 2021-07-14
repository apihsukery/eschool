<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();

        return view('userview.user')->with('users', $users);
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
        // $validated = $request->validate([
        //     'role_id'   => 'required',
        //     'ic'        => 'required|max:12',
        //     'name'      => 'required|max:255',
        //     'email'     => 'required|unique:users',
        // ]);

        $id =   DB::table('users')
                ->select(DB::raw("(CASE WHEN MAX(id) IS NULL
                THEN CONCAT(YEAR(CURRENT_TIME),'001')
                ELSE CONCAT(YEAR(CURRENT_TIME), LPAD((CONVERT(SUBSTRING_INDEX(MAX(id),CONCAT(YEAR(CURRENT_TIME)),-1),UNSIGNED INTEGER) + 1),3,'0')) END) AS id"))
                ->whereRaw('SUBSTR(id,1,4) = YEAR(CURRENT_TIME)')
                ->get();
                    
        // $prefix = "U-".date('Y'); 
        // $user_id = IdGenerator::generate(['table' => 'user', 'length' => 10, 'prefix' =>$prefix]);
        $user = new User([
            'id' => $id[0]->id,
            'ic' => $request->get('ic'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('ic'),
            'role_id' => $request->get('role_id')
        ]);
        $user->save();
        return redirect('/register')->with('success', 'New User Registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
