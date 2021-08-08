<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\ClassLink;
use App\Models\ContactUs;
use App\Models\Slider;
use App\Models\WeekSh;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Morilog\Jalali\Jalalian;

class GuestController extends Controller
{
    public function Index()
    {
        $Today=Jalalian::now();
        $Slider=Slider::where('StartDate','<=',$Today)
                      ->where('EndDate','>=',$Today)
                      ->get();
        return view('index')->with('Slider',$Slider);
    }
    public function Announcements()
    {
        Paginator::useBootstrap();
        $Announcement=Announcements::paginate(10);
        return view('Announcements')->with('Announcement',$Announcement);
    }
    public function WeeklySchedule()
    {
        Paginator::useBootstrap();
        $Wkardani=WeekSh::where(['M'=>'0','status'=>'0'])->paginate(10,['*'],'Wkardani');
        $Wkarshenasi=WeekSh::where(['M'=>'1','status'=>'0'])->paginate(10,['*'],'Wkarshenasi');
        $Ckardani=WeekSh::where(['M'=>'0','status'=>'1'])->paginate(10,['*'],'Ckardani');
        $Ckarshenasi=WeekSh::where(['M'=>'1','status'=>'1'])->paginate(10,['*'],'Ckarshenasi');
        return view('weekly-schedule')->with(['Wkardani'=>$Wkardani,'Wkarshenasi'=>$Wkarshenasi,'Ckardani'=>$Ckardani,'Ckarshenasi'=>$Ckarshenasi]);
    }
    public function ClassLinks()
    {
        $Class=ClassLink::paginate(10);
        $Announ=Announcements::where('ClassLink','<>',null)->get();
        return view('classlinks')->with(['Class'=>$Class,'Announ'=>$Announ]);
    }
    public function ClassLinksSearch(Request $request)
    {
//        return $Day;
            $Class=ClassLink::where('LessonTitle','like','%'.$request->id.'%')
                ->orWhere('LessonCode','like','%'.$request->id.'%')
                ->orWhere('DayOfWeek','like','%'.$request->id.'%')
                ->orWhere('TeacherName','like','%'.$request->id.'%')
                ->paginate(20);
//        $Class=ClassLink::where('LessonTitle','like','%'.$request->id.'%')->paginate(20);
        $Announ=Announcements::where('ClassLink','<>',null)->get();
        return view('classlinks')->with(['Class'=>$Class,'Announ'=>$Announ]);
    }
//    public function About_us()
//    {
//        return view('about-us');
//    }
    public function View($type,$id)
    {
        if ($type=='week')
        {
            $WeekSh=WeekSh::find($id);
            return response()->file('storage'.$WeekSh->attachment);
        }
        if ($type=='announ')
        {
            $Announcement=Announcements::find($id);
            return response()->file('storage'.$Announcement->attachment);
        }

    }
    public function Download($type,$id)
    {
        if ($type=='week')
        {
            $WeekSh=WeekSh::find($id);
            return response()->download('storage'.$WeekSh->attachment);
        }
        elseif ($type=='announ')
        {
            $Announcement=Announcements::find($id);
            return response()->download('storage'.$Announcement->attachment);
        }
    }
    //ContactUs
    public function Add(Request $request)
    {
        ContactUs::create([
           'fullname'=>$request->name,
           'phonenumber'=>$request->phonenumber,
           'text'=>$request->text,
        ]);
        return redirect()->back()->with('success','پیام شما ارسال شد.');
    }
    public function SearchClass($id=null)
    {
        if  ($id!=null)
        {
            $output='<ul class="dropdown-menu" style="display: block;position:relative;">';
            $Class=ClassLink::where('LessonTitle','like','%'.$id.'%')
                ->orWhere('LessonCode','like','%'.$id.'%')
                ->orWhere('DayOfWeek','like','%'.$id.'%')
                ->orWhere('TeacherName','like','%'.$id.'%')
                ->get();
            foreach ($Class as $class)
            {
                $output.='<li class="click"><a href="#">'.$class->LessonTitle.'</a></li>';
            }
            $output .= '</ul>';
            return response()->json(['Output'=>$output]);
        }
        else{
            return response()->json(['Output'=>null]);
        }
    }
}
