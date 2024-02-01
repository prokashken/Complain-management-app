<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class ItemController extends Controller
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

     public function getInfo($category_id)
    {
        $item = Item::where('category',$category_id)->where('user_id',Auth::user()->id)->get();
        return response()->json($item);
    }

    public function getInfo2($id)
    {
        $item = Item::where('id',$id)->get();
        return response()->json($item);
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        
        $request->validate([
            'pir_no' => ['unique:'.Item::class],
            'po_no' => ['unique:'.Item::class],
            'amc_no' => ['unique:'.Item::class],
            'mac' => ['unique:'.Item::class],
        ]);

        if ($request->has('serial')) {
            $str = implode(",",$request->serial);
        }
        // dd($request->all());
        // $item_forms =  ItemForm::find(1);
        // if ($item_forms->pir_no_required == 'required') {
        //     $request->validate([
        //         'pir_no' => ['unique:'.Item::class],
        //     ]);
        // }
        // if ($item_forms->po_no_required == 'required') {
        //     $request->validate([
        //         'po_no' => ['unique:'.Item::class],
        //     ]);
        // }
        // if ($item_forms->amc_no_required == 'required') {
        //     $request->validate([
        //         'amc_no' => ['unique:'.Item::class],
        //     ]);
        // }
        // if ($item_forms->mac_required == 'required') {
        //     $request->validate([
        //         'mac' => ['unique:'.Item::class],
        //     ]);
        // }

        $item = new Item();
        $item->user_id = Auth::user()->id;
        $item->category = $request->name;
        $item->product_name = $request->product_name;
        $item->qty = $request->qty;
        $item->delivery_date = $request->delivery_date;
        $item->device_name = $request->device_name;
        $item->qty = $request->qty;
        $item->pir_no = $request->pir_no;
        // if ($request->device_name != null) {
            // $item->device_name = $request->device_name;
        // }
        // if ($request->po_no != null) {
            $item->po_no = $request->po_no;
        // }
        // if ($request->po_amount != null) {
            $item->po_amount = $request->po_amount;
        // }
        // if ($request->po_date != null) {
            $item->po_date = $request->po_date;
        // }
        $item->warranty_years = $request->warranty_years;
        $item->days_left_warranty = $request->days_left_warranty;
        $item->mac = $request->mac;
        $item->amc_no = $request->amc_no;
        $item->amc_start = $request->amc_start;
        $item->amc_end = $request->amc_end;
        $item->want_amc = $request->want_amc;
        if ($request->has('serial')) {
            $item->serial = $str;
        }

        $item->save();

        return redirect()->back();

    }

    public function addPIR(Request $request)
    {
        $request->validate([
            'pir_no' => ['unique:'.Item::class],
        ]);

        $item = Item::find($request->item_id);
        $item->pir_no = $request->pir_no;
        $item->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('user.edit-item',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $item = Item::find($id);

        if (($item->pir_no != $request->pir_no) && ($request->pir_no != null)) {
            $request->validate([
                'pir_no' => ['unique:'.Item::class],
            ]);
        }
        if (($item->po_no != $request->po_no) && ($request->po_no != null)) {
            $request->validate([
                'po_no' => ['unique:'.Item::class],
            ]);
        }
        if (($item->amc_no != $request->amc_no) && ($request->amc_no != null)) {
            $request->validate([
                'amc_no' => ['unique:'.Item::class],
            ]);
        }
        if (($item->mac != $request->mac) && ($request->mac != null)) {
            $request->validate([
                'mac' => ['unique:'.Item::class],
            ]);
        }

        $item->device_name = $request->device_name;
        $item->pir_no = $request->pir_no;
        $item->po_no = $request->po_no;
        $item->po_amount = $request->po_amount;
        $item->po_date = $request->po_date;
        $item->warranty_years = $request->warranty_years;
        $item->mac = $request->mac;
        $item->want_amc = $request->want_amc;
        $item->amc_no = $request->amc_no;
        $item->amc_start = $request->amc_start;
        $item->amc_end = $request->amc_end;
        $item->edited = 1;
        $item->save();
        $user_id = Auth::user()->id;
        return redirect("/item-lists/$user_id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back();
    }

    public function itemLists($id)
    {

        $itemList = Item::where('user_id',$id)->paginate(10);
        return view('user.items',compact('itemList'));
    }

    public function editReasonUpdate(Request $request)
    {

        $item = Item::find($request->item_id);
        $data['emp_name'] = Auth::user()->name;
        $data['emp_id'] = Auth::user()->id;
        $data['email'] = Auth::user()->email;
        $data['phone'] = Auth::user()->phone;
        $data['item_id'] = $item->id;
        $data['edit_reason'] = $request->edit_reason;
        $data['title'] = 'Request for edit an item';

        $item->edit_reason = $request->edit_reason;
        $item->save();


        Mail::send('itemEditMail',['data'=>$data],function($message) use ($data){
            $message->to('prokashbiswas35@gmail.com')->subject($data['title']);
        });
        return redirect()->back();
    }

    public function editPermissionUpdate(Request $request)
    {
        $item = Item::find($request->item_id);
        $data['item_id'] = $item->id;
        $data['catgory'] = $item->cat->category_name;
        $data['created_at'] = $item->created_at;
        $data['title'] = 'Permission Approved for edit an item';

        $item->edit_access = 1;
        $item->save();


        Mail::send('permissionAppEmail',['data'=>$data],function($message) use ($data){
            $message->to('prokashbiswas35@gmail.com')->subject($data['title']);
        });
        return redirect()->back();
    }
}
