<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassLink;
use Illuminate\Http\Request;

class ClassLinkController extends Controller
{
    public function index()
    {
        $Class=ClassLink::paginate(20);
        return view('Admin.ClassLink')->with('Class',$Class);
    }
    public function Add(Request $request)
    {
        ClassLink::create([
            'ERCode'=>$request->ERCode,
            'LessonCode'=>$request->Code,
            'LessonTitle'=>$request->Name,
            'DayOfWeek'=>$request->Day,
            'StartTime'=>$request->StartTime,
            'EndTime'=>$request->EndTime,
            'TeacherName'=>$request->TeacherName,
            'ClassLink'=>$request->ClassLink
        ]);
        return redirect()->back();
    }
    public function Edit(Request $request)
    {
        ClassLink::where('ERCode', $request->OldCode)->update([
            'ERCode' => $request->ERCode,
            'LessonCode' => $request->Code,
            'LessonTitle' => $request->Name,
            'DayOfWeek' => $request->Day,
            'StartTime' => $request->StartTime,
            'EndTime' => $request->EndTime,
            'TeacherName' => $request->TeacherName,
            'ClassLink' => $request->ClassLink
        ]);
        return redirect()->back();
    }
}
