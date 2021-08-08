<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function Index()
    {
        $teacher=Teacher::all();
        return view('Admin.teacher')->with(['Teacher'=>$teacher]);
    }

    public function Add(Request $request)
    {
        if ($request->status)
        {
            $Status=$request->status;
        }
        else{
            $Status=0;
        }
        try {
            Teacher::create([
                'CodePrsn'=>$request->CodePrsn,
                'CodeRank'=>$request->Rank,
                'BrcName'=>$request->Branch,
                'Telephone'=>$request->Telephone,
                'PhoneNumber'=>$request->Phonenumber,
                'Email'=>$request->Email,
                'Address'=>$request->Address,
                'Status'=>$Status
            ]);
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function Edit(Request $request)
    {
        if ($request->status)
        {
            $Status=$request->status;
        }
        else{
            $Status=0;
        }
        try {
            Teacher::where('CodePrsn',$request->OldCodePrsn)->update([
                'CodePrsn'=>$request->CodePrsn,
                'CodeRank'=>$request->Rank,
                'BrcName'=>$request->Branch,
                'Telephone'=>$request->Telephone,
                'PhoneNumber'=>$request->Phonenumber,
                'Email'=>$request->Email,
                'Address'=>$request->Address,
                'Status'=>$Status
            ]);
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function Delete()
    {

    }
    public function AutoComplete($type,$id=null)
    {
        if ($id!=null) {
            $User = User::where('CodePrsn', 'like', '%' . $id . '%')->get();
            if ($type=='Add')
            {
                $output = '<ul id="AddTeacher" class="dropdown-menu" style="display: block;position:relative;">';
            }
            elseif ($type=='Edit')
            {
                $output = '<ul id="EditTeacher" class="dropdown-menu" style="display: block;position:relative;">';
            }
            foreach ($User as $user) {
                $output .= '<li class="click"><a href="#">' . $user->CodePrsn . '</a></li>';
            }
            $output .= '</ul>';
            return response()->json(['Output' => $output,'User'=>$User]);
        }
        else{
            return response()->json(['Output' => null]);
        }
    }

    public function GetInformation($id)
    {
        $Teacher=Teacher::where('CodePrsn',$id)->first();
        $Teacher->User;
        return response()->json($Teacher);
    }
}
