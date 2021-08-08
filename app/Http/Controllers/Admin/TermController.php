<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermController extends Controller
{
    public function index()
    {
        $Term=Term::all();
        return view('Admin.term')->with('Term',$Term);
    }
    public function Add(Request $request)
    {
        Term::create([
            'CodeTrm'=>$request->CodeTrm,
            'NameTrm'=>$request->NameTrm,
        ]);
        return redirect()->back();
    }
    public function Edit(Request $request)
    {
        $Term=Term::where('CodeTrm',$request->OldCodeTrm)->update([
           'CodeTrm'=>$request->CodeTrm,
           'NameTrm'=>$request->NameTrm
        ]);
        return redirect()->back();
    }
    public function Delete(Request $request)
    {
        Term::where('CodeTrm',$request->CodeTrm)->delete();
        return redirect()->back();
    }
}
