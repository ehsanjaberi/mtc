<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcements;
use App\Models\ClassLink;
use App\Models\Slider;
use Cassandra\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        $Slider=Slider::all();
        $Announcements=Announcements::all();
        $Class=ClassLink::all();
        return view('Admin.setting')->with(['Slider'=>$Slider,'Announcements'=>$Announcements,'Class'=>$Class]);
    }
//    Announcements
    public function AddAnnouncement(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:255'],
        ])->validate();
        $Announcement=new Announcements();
        $Announcement->title=$request->title;
        $Announcement->text=$request->text;
        $Announcement->ClassLink=$request->ClassLink;
        if ($request->hasFile('attachment'))
        {
            $exception=$request->file('attachment')->getClientOriginalExtension();
            $filename=time().'.'.$exception;
            $path=$request->file('attachment')->storeAs('public/Announcement',$filename);
            $Announcement->attachment=str_replace('public','',$path);
        }
        $Announcement->save();
        return $request;
    }
    public function EditAnnouncement(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:255'],
        ])->validate();
        $Announcement=Announcements::find($request->id);
        $Announcement->title=$request->title;
        $Announcement->text=$request->text;
        $Announcement->ClassLink=$request->ClassLink;
        if ($request->hasFile('attachment'))
        {
            if ($Announcement->attachment)
            {
                Storage::delete('public'.$Announcement->attachment);
            }
            $exception=$request->file('attachment')->getClientOriginalExtension();
            $filename=time().'.'.$exception;
            $path=$request->file('attachment')->storeAs('public/Announcement',$filename);
            $Announcement->attachment=str_replace('public','',$path);
        }
        if ($request->removeattachment)
        {
            Storage::delete('public'.$Announcement->attachment);
            $Announcement->attachment=null;
        }
        $Announcement->save();
        return action([SettingController::class,'index']);
    }
    public function destroyAnnouncement(Request $request)
    {
//        return $request;
        $Announcement=Announcements::find($request->id);
        Storage::delete('public'.$Announcement->attachment);
        Announcements::find($request->id)->delete();
        return redirect()->back();
    }
//    Slider
    public function StoreImg(Request $request)
    {
        Validator::make($request->all(),[
            'image' => ['required'],
            'StartDate' => ['required'],
            'EndDate' => ['required'],
        ])->validate();
        $exception=$request->file('image')->getClientOriginalExtension();
        $filename=time().'.'.$exception;
        $path=$request->file('image')->storeAs('public/Slider',$filename);
        Slider::create([
           'image_url'=>str_replace('public','',$path),
            'StartDate'=>$request->StartDate,
            'EndDate'=>$request->EndDate,
        ]);
        return action([SettingController::class,'index']);
    }
    public function EditImg(Request $request)
    {
        Validator::make($request->all(),[
            'StartDate' => ['required'],
            'EndDate' => ['required'],
        ])->validate();
        $Slider=Slider::find($request->id);
        if ($request->hasFile('image'))
        {
            Storage::delete('public'.$Slider->image_url);
            $exception=$request->file('image')->getClientOriginalExtension();
            $filename=time().'.'.$exception;
            $path=$request->file('image')->storeAs('public/Slider',$filename);
            $Slider->image_url=str_replace('public','',$path);
        }
        $Slider->StartDate=$request->StartDate;
        $Slider->EndDate=$request->EndDate;
        $Slider->save();
        return action([SettingController::class,'index']);
    }
    public function destroyImg(Request $request)
    {
//        return $request;
        $Slider=Slider::find($request->id);
        Storage::delete('public'.$Slider->image_url);
        Slider::find($request->id)->delete();
        return redirect()->back();
    }
}
