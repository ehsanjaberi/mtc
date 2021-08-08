<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessLevel;
use App\Models\UserAccessLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Psr7\str;

class AccessLevelController extends Controller
{
    public function index()
    {
        $AccessLevels=AccessLevel::all();
        $UserAccessLevel=UserAccessLevel::all();
        foreach ($UserAccessLevel as $UAL)
        {
            if ($UAL->access_level_id)
            {
                $ids=str_split($UAL->access_level_id,3);
                $UAL->access_level_id=$ids;
            }
        }
        return view('Admin.AccessLevel')->with(['UserAccessLevel'=>$UserAccessLevel,'AccessLevels'=>$AccessLevels]);
    }
    public function Store(Request $request)
    {

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ])->validate();
        if ($request->AL)
        {
            $request->AL=implode("",$request->AL);
        }
        UserAccessLevel::create([
            'Name'=>$request->name,
            'access_level_id'=>$request->AL,
        ]);
        return redirect()->back();
    }
    public function Edit(Request $request)
    {
        Validator::make($request->all(), [
            'EditName' => ['required', 'string', 'max:255'],
        ])->validate();
        if ($request->AL)
        {
            $request->AL=implode("",$request->AL);
        }
        UserAccessLevel::where('id',$request->id)
            ->update([
                'Name'=>$request->EditName,
                'access_level_id'=>$request->AL,

            ]);
        return redirect()->back();
    }
}
