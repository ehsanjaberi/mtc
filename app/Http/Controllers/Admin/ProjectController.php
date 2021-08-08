<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\branch;
use App\Models\Project;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function Index(){
        $CodePrsn=Auth::user()->CodePrsn;
        $FullName=Auth::user()->Fname .' '. Auth::user()->Lname;
        $Melli=Auth::user()->CodeNational;
        $EnterTerm=substr(Auth::user()->CodePrsn,0,3);
        $branch=branch::where('CodeBranch',substr(Auth::user()->CodePrsn,8,3))->first();
        $Field=$branch->NameBranch;
        $DayOrNight=substr(Auth::user()->CodePrsn,4,1) == 1 ? 'روزانه':'شبانه';
        $Section=substr(Auth::user()->CodePrsn,3,1) == 1 ? 'کاردانی':'کارشناسی ناپیوسته';
        $Teacher=Teacher::where('Status',1)->get();
        $Project=Project::where('CodePrsn',Auth::user()->CodePrsn)->first();
//        return $Project;
        return view('Admin.project',[
            'FullName'=>$FullName,
            'Melli'=>$Melli,
            'CodePrsn'=>$CodePrsn,
            'EnterTerm'=>$EnterTerm,
            'Field'=>$Field,
            //'Tendency'=>$Tendency,
            'Section'=>$Section,
            'DayOrNight'=>$DayOrNight,
            'Teacher'=>$Teacher,
            'Project'=>$Project]);
    }

    public function Add(Request $request)
    {
//        return $request;
        try {
            $project=new Project();
            $project->CodePrsn=$request->CodePrsn;
            $project->CountUnit=$request->Countunit;
            $project->Email=$request->Email;
            $project->Telephone=$request->Telephone;
            $project->PhoneNumber=$request->PhoneNumber;
            $project->Address=$request->Address;
            $project->ProjectMasterCode=$request->MasterName;
            $project->ProjectAdvisorCode=$request->AdvisorName;
            $project->Title=$request->Title;
            $project->ProjectType=$request->ProjectType;
            $project->Proposed=$request->Proposal;
            $project->GroupMember=$request->G_Members;
            $project->Summary=$request->Summary;
            $project->Equipment=$request->Equipment;
            $project->HowDoJob=$request->HowdoJob;
            $project->save();
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }
    public function Edit(Request $request)
    {
        try {
            Project::where('CodePrsn',$request->CodePrsn)->update([
            'CountUnit'=>$request->Countunit,
            'Email'=>$request->Email,
            'Telephone'=>$request->Telephone,
            'PhoneNumber'=>$request->PhoneNumber,
            'Address'=>$request->Address,
            'ProjectMasterCode'=>$request->MasterName,
            'ProjectAdvisorCode'=>$request->AdvisorName,
            'Title'=>$request->Title,
            'ProjectType'=>$request->ProjectType,
            'Proposed'=>$request->Proposal,
            'GroupMember'=>$request->G_Members,
            'Summary'=>$request->Summary,
            'Equipment'=>$request->Equipment,
            'HowDoJob'=>$request->HowdoJob,
            'status'=>0
        ]);
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function ShowProject()
    {
        $Project=Project::where('ProjectMasterCode',Auth::user()->CodePrsn)->get();
        return view('Admin.showproject')->with(['Project'=>$Project]);
    }

    public function Accept(Request $request)
    {
        try {
            Project::where('CodePrsn',$request->Code)->update([
                'Message'=>$request->Msg,
                'status'=>1
            ]);
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }
    public function Denial(Request $request)
    {
        try {
            Project::where('CodePrsn',$request->Code)->update([
                'Message'=>$request->Msg,
                'status'=>2
            ]);
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }
}
