<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    const ROOT_PATH = "admin.users.";
    public function index()
    {
        $users = User::all();
        return view(self::ROOT_PATH . __FUNCTION__ , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::ROOT_PATH . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (validator()->fails()) {
            dd(validator()->errors());
        }
        try {
            DB::transaction(function() use ($request) {
                $data = $request->except('image');

                if(isset($data['type'])){
                    $data['type'] =User::TYPE_ADMIN;
                }


                if($request->hasFile('image')){
                    $data['image'] = Storage::put('users', $request->file('image'));
                }

                User::create($data);

            },3);

            return redirect()->route('admin.users.index')
            ->with("success", "Thao tác thành công !");

        } catch (Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view(self::ROOT_PATH . __FUNCTION__, compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view(self::ROOT_PATH . __FUNCTION__, compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {

            DB::transaction(function() use ($request, $user) {
                $data = $request->except('image','password');

                isset($data['type']) ? $data['type'] =User::TYPE_ADMIN : $data['type'] =User::TYPE_MEMBER;

                if(!empty($request->password)){
                    $data['password'] =$request->password;
                }

                if($request->hasFile('image')){
                    $data['image'] = Storage::put('users', $request->file('image'));
                    if($user->image && Storage::exists($user->image)){
                        Storage::delete($user->image);
                    }
                }


                $user->update($data);

            },3);

            return back()
            ->with("success", "Thao tác thành công !");

        } catch (Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */

}
