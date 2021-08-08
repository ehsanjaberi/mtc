<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Models\AccessLevel;
use App\Models\User;
use App\Models\UserAccessLevel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UsersController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $Users=User::paginate(10);
        return view('Admin.users')->with(['Users'=>$Users]);
    }

    public function SUser(Request $request)
    {
        Paginator::useBootstrap();
        $Users=User::where('CodePrsn','like','%'.$request->CodePrsn.'%')->paginate(10);
        return view('Admin.users')->with(['Users'=>$Users]);
    }
    public function GetInformation(Request $request)
    {
        $User=User::where('CodePrsn',$request->CodePrsn)->first();
        $Roles=UserAccessLevel::all();
            return response()->json(['roles'=>$Roles,'user'=>$User]);
    }
    public function Edit(Request $request,UpdateUserProfileInformation $updator)
    {
//        return User::where('CodePrsn',$request->OldCodePrsn)->get();
        $updator->update($request->OldCodePrsn,$request->all());
        return action([UsersController::class,'index']);
    }
    public function destroy(Request $request)
    {
        User::where('CodePrsn',$request->id)->delete();
        return redirect()->back();
    }
    public function Roles(Request $request)
    {
//        return $request;
        if ($request->UAL!=0)
        {
            $User=User::where('CodePrsn',$request->RoleUserId)->first();
            $User->CodeAccess=$request->UAL;
            $User->save();
        }
        return redirect()->back();
    }

    //
    public function AutoComplete($id=null)
    {
        if ($id!=null) {
            $User = User::where('CodePrsn', 'like', '%' . $id . '%')->get();
            $output = '<ul class="dropdown-menu" style="display: block;position:relative;">';
            foreach ($User as $user) {
                $output .= '<li class="click"><a href="#">' . $user->CodePrsn . '</a></li>';
            }
            $output .= '</ul>';
            return response()->json(['Output' => $output]);
        }
        else{
            return response()->json(['Output' => null]);
        }
    }
}
