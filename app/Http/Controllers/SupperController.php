<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class SupperController extends Controller
{
    public function index()
    {
        $subAdminList = User::where('is_admin',1)->get();
        if (Auth::user()->is_admin == 0) {
            $ticketList = Ticket::where('status','!=',3)->get();
            return view('admin.admin_home',compact('subAdminList', 'ticketList'));
        } else {
            if (Auth::user()->role != null) {
                $ticketList = Ticket::where(function($query){
                    $query->where('assigned_person','=',null)
                          ->orWhere('assigned_person','=',Auth::user()->id);
                })
                ->where('status','!=',3)
                ->where('ticket_type','=',Auth::user()->role)
                ->get();
                
                return view('admin.subadmin_home',compact('subAdminList', 'ticketList'));
            }
            
        }

        return redirect()->back()->with('status', 'Wait for Admin Review');
        
    }

    public function amcRequirList()
    {
        $subAdminList = User::where('is_admin',1)->get();
        // $amcRequirList = Item::where('days_left_warranty','<=','15')->where('amc_no',null)->get();
        $amcRequirList = Item::where(function ($query){
            $query->where('days_left_warranty','<=','15')
            ->where('amc_no',null);
        })
        ->orWhere(function ($query){
            $query->where('want_amc','=',1)
            ->where('amc_no',null);
        })
        ->get();
        return view('admin.amcrequirelist',compact('subAdminList','amcRequirList'));
    }

      public function amcList()
    {
        $subAdminList = User::where('is_admin',1)->get();
        $amcList = Item::where('amc_no','!=',null)->get();

        return view('admin.amclist',compact('subAdminList','amcList'));
    }

    public function amcedit($id)
    {
        $item = Item::find($id);
        return view('admin.amcrenew',compact('item'));
    }

    public function amcGeneratEdit($id)
    {
        $item = Item::find($id);
        return view('admin.amcgenerate',compact('item'));
    }

    public function amcGeneratUpdate(Request $request, $id)
    {
        $request->validate([
            'amc_no' => ['unique:'.Item::class],
        ]);

        $item = Item::find($id);
        $item->amc_no = $request->amc_no;
        $item->amc_start = $request->amc_start;
        $item->amc_end = $request->amc_end;
        $item->save();
        return redirect()->back();
    }

     public function amcupdate(Request $request, $id)
    {

        $item = Item::find($id);
        if ($item->amc_no != $request->amc_no) {
            $request->validate([
                'amc_no' => ['unique:'.Item::class],
            ]);
        }
        $item->amc_no = $request->amc_no;
        $item->amc_start = $request->amc_start;
        $item->amc_end = $request->amc_end;
        $item->save();
        return redirect()->back();
    }

    public function emplist()
    {
        $subAdminList = User::where('is_admin',1)->get();
        $empList = User::where('is_admin',2)->get();
        return view('admin.emplist',compact('subAdminList','empList'));

        // return DataTables::of(User::where('is_admin',2))
        // ->addIndexColumn()
        // ->addColumn('id', function ($row){
        //     return view("admin.employ.id",compact('row'));   
        //     })
        // ->addColumn('name', function ($row){
        //     return view("admin.employ.name",compact('row'));   
        //     })
        // ->addColumn('emp_id', function ($row){
        //     return view("admin.employ.empid",compact('row'));   
        //     })
        // ->addColumn('department', function ($row){
        //     return view("admin.employ.department",compact('row'));   
        //     })
        // ->addColumn('designation', function ($row){
        //     return view("admin.employ.designation",compact('row'));   
        //     })
        // ->addColumn('phone', function ($row){
        //     return view("admin.employ.phone",compact('row'));   
        // })
        // ->make(true);


    }

      public function list(Request $request)
    {
        // return response()->json($request->all());
        if ($request->ajax()) {
            $ticket_list = Ticket::where('status','!=',3)->get();
            
            if($request->filled('status'))
            { 
                $ticket_list = Ticket::where('status','!=',3)->where('status', $request->status)->get();
            }

            if($request->filled('year'))
            { 
                $ticket_list = Ticket::where('status','!=',3)
                                ->whereYear('created_at', $request->year)
                                ->get();
                
            }

            if($request->filled('year') && $request->filled('status'))
            { 
                $ticket_list = Ticket::where('status','!=',3)
                                ->where('status', $request->status)
                                ->whereYear('created_at', $request->year)
                                ->get();
                
            }

            if($request->filled('month') && $request->filled('year'))
            { 
                $ticket_list = Ticket::where('status','!=',3)
                                ->whereYear('created_at', $request->year)
                                ->whereMonth('created_at', $request->month)
                                ->get();
                
            }

            if($request->filled('month') && $request->filled('year') && $request->filled('status'))
            { 
                $ticket_list = Ticket::where('status','!=',3)
                                ->where('status', $request->status)
                                ->whereYear('created_at', $request->year)
                                ->whereMonth('created_at', $request->month)
                                ->get();
                
            }

            if($request->filled('from_day') && $request->filled('month') && $request->filled('year'))
            { 
                $ticket_list = Ticket::where('status','!=',3)
                                ->whereYear('created_at', $request->year)
                                ->whereMonth('created_at', $request->month)
                                ->whereDay('created_at', $request->from_day)
                                ->get();

            }

            if($request->filled('from_day') && $request->filled('month') && $request->filled('year') && $request->filled('status'))
            { 
                $ticket_list = Ticket::where('status','!=',3)
                                ->where('status', $request->status)
                                ->whereYear('created_at', $request->year)
                                ->whereMonth('created_at', $request->month)
                                ->whereDay('created_at', $request->from_day)
                                ->get();

            }

            if($request->filled('to_day') && $request->filled('from_day') && $request->filled('month') && $request->filled('year'))
            { 
                $from_date = $request->year.'-'.$request->month.'-'.$request->from_day;
                $to_date = $request->year.'-'.$request->month.'-'.$request->to_day;
                $ticket_list = Ticket::where('status','!=',3)
                ->whereBetween('created_at', [$from_date.' 00:00:01', $to_date.' 23:59:59'])
                ->get();
            }

            if($request->filled('to_day') && $request->filled('from_day') && $request->filled('month') && $request->filled('year') && $request->filled('status'))
            { 
                $from_date = $request->year.'-'.$request->month.'-'.$request->from_day;
                $to_date = $request->year.'-'.$request->month.'-'.$request->to_day;
                $ticket_list = Ticket::where('status','!=',3)
                ->where('status', $request->status)
                ->whereBetween('created_at', [$from_date.' 00:00:01', $to_date.' 23:59:59'])
                ->get();
            }

            return DataTables::of($ticket_list)->addIndexColumn()
            ->addColumn('choose_equip', function ($row) {
                    return view("admin.employ.equip_name",compact("row"));
                })
            ->addColumn('pir_no', function ($row) {
                return view("admin.employ.pir_no",compact("row"));
            })
            ->addColumn('amc_no', function ($row) {
                return view("admin.employ.amc_no",compact("row"));
            })
            ->addColumn('assigned_person', function ($row) {
                return view("admin.employ.assigned_person",compact("row"));
            })
            ->addColumn('ticket_type', function ($row) {
                return view("admin.employ.ticket_type",compact("row"));
            })
            ->addColumn('action_taken', function ($row) {
                return view("admin.employ.action_taken",compact("row"));
            })
            ->addColumn('status', function ($row) {
                return view("admin.employ.status",compact("row"));
            })
            ->addColumn('screenshot', function ($row) {
                return view("admin.employ.screenshot",compact("row"));
            })
            ->make(true);
        }
    }

    public function closedTicket()
    {
        $subAdminList = User::where('is_admin',1)->get();
        $ticketList = Ticket::where('status','=',3)->paginate(100);
        return view('admin.closed',compact('subAdminList', 'ticketList'));
    }

    public function store(Request $request)
    {

         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'emp_id' => ['required', 'digits:5','unique:'.User::class],
            'designation' => ['required', 'max:255'],
            'phone' => ['required','numeric','digits:10','unique:'.User::class],
            'email' => ['required','string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->emp_id = $request->emp_id;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->is_admin = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.edit',compact('user'));
    }

    public function updateSubAdmin(Request $request, $id)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'emp_id' => ['required', 'max:255','unique:'.User::class],
        //     'designation' => ['required', 'max:255'],
        //     'phone' => ['required','numeric','digits:10','unique:'.User::class],
        //     'email' => ['required','string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'role' => ['required'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->emp_id = $request->emp_id;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->is_admin = 1;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

         return redirect('/adhome');
        
    }

    public function delete(Request $request)
    {
        foreach ($request->checkbox as $key => $value) {
            $subAdmin = User::find($value);
            $subAdmin->delete();

            if (Ticket::where('assigned_person', $value)->exists()) {
                Ticket::where('assigned_person', $value)
                ->chunkById(100, function (Collection $tickets) {
                    $tickets->each->update(['assigned_person' => null]);
                }, $column = 'id');
            }
        }

        return redirect()->back();
    }
public function charIndex()
{
    $from = "No filter used";
    $to = "No filter used";
    $notDone = Ticket::where('status',0)->get()->count();
    $partialyDone = Ticket::where('status',1)->get()->count();
    $done = Ticket::where('status',2)->get()->count();
    $closed = Ticket::where('status',3)->get()->count();

    return view('admin.chart',compact('from','to','notDone','partialyDone','done','closed'));
}

    public function getBarChartData(Request $request)
    {
        $from = null;
        $to = null;

        if ($request->has('from')) {
            $from = $request->from;
        }

        if ($request->has('to')) {
            $to = $request->to;
        }
        $notDone = Ticket::where('status',0)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->selectRaw('COUNT(status) as not_done')
        ->first()->not_done;

        $partialyDone = Ticket::where('status',1)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->selectRaw('COUNT(status) as partialy_done')
        ->first()->partialy_done;

        $done = Ticket::where('status',2)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->selectRaw('COUNT(status) as done')
        ->first()->done;

        $closed = Ticket::where('status',3)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->selectRaw('COUNT(status) as closed')
        ->first()->closed;

        
        return view('admin.chart',compact('from','to','notDone','partialyDone','done','closed'));
    }

    function deleteEmp($id)
    {
        $user = User::find($id);
        $itemList = Item::where('user_id',$id)->get();

        foreach ($itemList as  $item) {
            $item->delete();
        }

        $user->delete();
        return redirect()->back();
    }
}
