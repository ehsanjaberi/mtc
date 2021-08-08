<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\WeekSh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChartController extends Controller
{
    public function index()
    {
        $Term=Term::all();
        $WeekSh=WeekSh::where('status','1')->get();

        return view('Admin.Chart')->with(['Term'=>$Term,'WeekSh'=>$WeekSh]);
    }

    public function Add(Request $request)
    {
        $WeekSh=new WeekSh();
        $WeekSh->title=$request->title;
        $exception=$request->file('attachment')->getClientOriginalExtension();
        $filename=time().'.'.$exception;
        $path=$request->file('attachment')->storeAs('public/WeekSh',$filename);
        $WeekSh->attachment=str_replace('public','',$path);

        $WeekSh->M=$request->M;
        $WeekSh->term=$request->term;
        $WeekSh->status=1;
        $WeekSh->save();
        return redirect()->back();
    }

    public function Edit(Request $request)
    {
        $WeekSh=WeekSh::find($request->id);
        $WeekSh->title=$request->title;
        $WeekSh->M=$request->M;
        $WeekSh->term=$request->term;
        if ($request->hasFile('attachment'))
        {
            Storage::delete('public'.$WeekSh->attachment);
            $exception=$request->file('attachment')->getClientOriginalExtension();
            $filename=time().'.'.$exception;
            $path=$request->file('attachment')->storeAs('public/WeekSh',$filename);
            $WeekSh->attachment=str_replace('public','',$path);
        }
        $WeekSh->save();
        return redirect()->back();
    }
    public function Delete(Request $request)
    {
        $WeekSh=WeekSh::find($request->id);
        Storage::delete('public'.$WeekSh->attachment);
        WeekSh::find($request->id)->delete();
        return redirect()->back();
    }

}
