<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\contact;
use App\Model\Admin\admin;
use App\Model\User\message;
use DB;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = DB::table('contacts')->count();
        if($c > 0)
        {
            $admin = admin::where('status',1)->first();
            $contact = contact::all()->first();
            return view('admin.contact.show',compact('admin','contact'));
        }
        else
        {
            DB::table('contacts')->insert(array("address"=>'Suvechaa-453, Sheik-ghat, Sylhet. Bangladesh.',"phoneNo"=>'+8801770129781',"email"=>'shareiarshams30015@gmail.com'));
            $admin = admin::where('status',1)->first();
            $contact = contact::all()->first();
            return view('admin.contact.show',compact('admin','contact'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = admin::where('status',1)->first();
        $messages = message::all();
        return view('admin.contact.message',compact('admin','messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'email' => 'required',
            'phoneNo' => 'required',
            'message'=>'required',
        ]);
        $message = new message();
        $message->fname = $request->fname;
        $message->lname = $request->lname;
        $message->email = $request->email;
        $message->phoneNo = $request->phoneNo;
        $message->message = $request->message;
        $message->save();  
        return redirect(route('contact'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = admin::where('status',1)->first();
        $contact = contact::where('id',$id)->first();
        return view('admin.contact.edit',compact('admin','contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'address'=>'required',
            'phoneNo' => 'required',
            'email' => 'required',
        ]);
        $contact = contact::find($id);
        $contact->address = $request->address;
        $contact->phoneNo = $request->phoneNo;
        $contact->email = $request->email;
        $contact->save();       
        $notification = array(
                'message' => 'Category Edit Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('admincontact.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        message::where('id',$id)->delete();
        $notification = array(
                'message' => 'Arrival destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}
