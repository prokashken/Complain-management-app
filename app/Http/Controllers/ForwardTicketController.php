<?php

namespace App\Http\Controllers;

use App\Models\ForwardTicket;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class ForwardTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $forwardTicket = new ForwardTicket();
        $forwardTicket->ticket_id = $request->ticket_id;
        // $forwardTicket->accepted_by = $request->accepted_by;
        $forwardTicket->accepted_by = Auth::user()->id;
        $forwardTicket->forwarded_to = $request->forwarded_to;
        $forwardTicket->reason = $request->reason;
        $forwardTicket->forwarded_date = Carbon::now('Asia/Kolkata');
        $forwardTicket->save();

        $ticket = Ticket::find($request->ticket_id);
        $ticket->assigned_person = $request->forwarded_to;
        $ticket->ticket_type = $request->forwarded_ticket_type;
        $ticket->forwarded = true;
        $ticket->save();
        return redirect()->back();

    }

    public function ticketForwardList()
    {
        $ticketForwardList =  ForwardTicket::paginate(100);
        $subAdminList = User::where('is_admin',1)->get();
        return view('admin.forwardlist',compact('ticketForwardList','subAdminList'));
    }

    /**
     * Display the specified resource.
     */

    public function getInfo($id)
    {
        $subadmin = User::where('id','!=',Auth::user()->id)->where('is_admin',1)->where('role',$id)->get();
        return response()->json($subadmin);
    }

    public function show(ForwardTicket $forwardTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForwardTicket $forwardTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForwardTicket $forwardTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForwardTicket $forwardTicket)
    {
        //
    }
}
