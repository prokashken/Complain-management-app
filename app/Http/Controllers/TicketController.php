<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Ticket;
use App\Models\User;
use App\Enums\TicketType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Mail;

class TicketController extends Controller
{
    // public function list()
    // {
    //     return DataTables::of(Ticket::where('emp_id',Auth::user()->emp_id)->where('name',Auth::user()->name))
    //     ->addIndexColumn()
    //     ->addColumn('id', function ($row){
    //         return view("user.ticketID",compact('row'));   
    //         })
    //     ->addColumn('assigned_person', function ($row){
    //         $personName = null;
    //         if ($row->assigned_person != null) {
    //             $person = User::find($row->assigned_person);
    //             $personName = $person->name;
    //         }
    //         return view("user.assignedPerson",compact('row','personName'));   
    //         })
    //     ->addColumn('error_type', function ($row){
    //         return view("user.errorType",compact('row'));   
    //         })
    //     ->addColumn('action_taken', function ($row){
    //         return view("user.actionTaken",compact('row'));   
    //         })
    //     ->addColumn('status', function ($row){
    //         return view("user.ticketStatus",compact('row'));   
    //         })
    //     ->addColumn('created_at', function ($row){
    //         return view("user.createdAt",compact('row'));   
    //     })
    //     ->make(true);
    // }

    // public function adminlist()
    // {
    //     return DataTables::of(Ticket::query())
    //     ->addIndexColumn()
    //     ->addColumn('id', function ($row){
    //         return view("user.ticketID",compact('row'));   
    //         })
    //     ->addColumn('assigned_person', function ($row){
    //         $personName = null;
    //         if (($row->assigned_person != null) && (User::where('id', $row->assigned_person)->exists())) {
    //             $person = User::find($row->assigned_person);
    //             $personName = $person->name;
    //         }
    //         return view("admin.assignedPerson",compact('row','personName'));   
    //         })
    //     ->addColumn('error_type', function ($row){
    //         return view("user.errorType",compact('row'));   
    //         })
    //     ->addColumn('action_taken', function ($row){
    //         return view("user.actionTaken",compact('row'));   
    //         })
    //     ->addColumn('status', function ($row){
    //         return view("user.ticketStatus",compact('row'));   
    //         })
    //     ->addColumn('created_at', function ($row){
    //         return view("user.createdAt",compact('row'));   
    //     })
    //     ->make(true);
    // }

    public function store(Request $request)
    {
// dd($request->all());
        // $item = Item::where('user_id',Auth::user()->id)
        //         ->where('category',$request->choose_equip)
        //         ->where('product_name',$request->product_name)
        //         ->first();

        $ticket = new Ticket();
        if($request->hasFile('screenshot')){
            $fileName = $request->screenshot->getClientOriginalName();
            $path = base_path() . '/public/screenshots/';
            move_uploaded_file($request->screenshot,$path.$fileName);
            $ticket->screenshot = $fileName;
         }
        $ticket->emp_name = $request->emp_name;
        $ticket->emp_id = $request->emp_id;
        $ticket->designation = $request->designation;
        $ticket->email = $request->email;
        $ticket->phone = $request->phone;
        $ticket->internal_no = $request->internal_no;
        $ticket->building_location = $request->building_location;
        $ticket->choose_equip = $request->product_name;
        $ticket->floor_no = $request->floor_no;
        $ticket->room_no = $request->room_no;
        $ticket->under_warranty = $request->under_warranty;
        // $ticket->under_warranty = $request->under_warranty;
        $ticket->ticket_type = $request->ticket_type;
        $ticket->message = $request->message;
        $ticket->save();

        $data = $request->all();
        $data['title'] = "New Ticket Created";
        // $data['ticketType'] = TicketType::getKey((int)$request->ticket_type);
        // dd($data);
        $subadminList = User::where('is_admin',1)->get();
        $admin = User::where('is_admin',0)->first();
        foreach ($subadminList as $subadmin) {
            $email = $subadmin->email;
            Mail::send('ticketCreatedMail',['data'=>$data],function($message) use ($data,$email){
                $message->to($email)->subject($data['title']);
            });
        }
        $admin_email = $admin->email;
        Mail::send('ticketCreatedMail',['data'=>$data],function($message) use ($data,$admin_email){
            $message->to($admin_email)->subject($data['title']);
        });

        return redirect()->back();
        // return redirect()->back()->with('status', 'Successfully Created!');
    }

    public function update(Request $request, $id)
    {

        $ticket = Ticket::find($id);
        if ($request->has('action_taken')) {
            $ticket->action_taken = $request->action_taken;
        }
        if ($request->has('status')) {

            if ($request->status == 3 && $ticket->screenshot != null) {
                $file = base_path() . '/public/screenshots/'.$ticket->screenshot;
                if (file_exists($file)) {
                    unlink($file);
                }
                $ticket->screenshot = null;
            }
            $ticket->status = $request->status;
        }
        if ($request->has('id')) {
            $ticket->assigned_person = $request->id;
            $ticket->mechanic = $request->mechanic;
        }
        if ($request->has('not_closed_reason')) {
            $ticket->not_closed_reason = $request->not_closed_reason;
        }
        $ticket->save();

        return redirect()->back();
    }
}
