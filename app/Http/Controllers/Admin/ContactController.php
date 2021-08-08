<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $Contacts=ContactUs::all();
        return view('Admin.Contact')->with('Contacts',$Contacts);
    }

    public function Delete(Request $request)
    {
        ContactUs::find($request->id)->delete();
        return redirect()->back();
    }
}
