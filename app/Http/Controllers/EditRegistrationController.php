<?php

namespace App\Http\Controllers;

use App\Models\ItemForm;
use App\Models\RegistrationForm;
use App\Models\TicketForm;
use Illuminate\Http\Request;

class EditRegistrationController extends Controller
{
  public function edit() 
    {
        $registration_form  = RegistrationForm::find(1);
        $item_form  = ItemForm::find(1);
        $ticket_form  = TicketForm::find(1);
        return view('admin.editRegistrationForm',compact('registration_form','item_form','ticket_form'));
    }

    public function store(Request $request)
    {
        
      $registration_form  = RegistrationForm::find(1);

      $registration_form->name_show  = $request->name_show;
      $registration_form->name_required = $request->name_required;

      $registration_form->emp_id_show = $request->emp_id_show;
      $registration_form->emp_id_required  = $request->emp_id_required;

      $registration_form->department_show  =  $request->department_show;
      $registration_form->department_required  = $request->department_required;

      $registration_form->designation_show  = $request->designation_show;
      $registration_form->designation_required  = $request->designation_required;

      $registration_form->phone_show  = $request->phone_show;
      $registration_form->phone_required  = $request->phone_required;

      $registration_form->internal_no_show  = $request->internal_no_show;
      $registration_form->internal_no_required  = $request->internal_no_required;

      $registration_form->building_location_show  = $request->building_location_show;
      $registration_form->building_location_required  = $request->building_location_required;

      $registration_form->floor_no_show  = $request->floor_no_show;
      $registration_form->floor_no_required  = $request->floor_no_required;

      $registration_form->room_no_show  = $request->room_no_show;
      $registration_form->room_no_required  = $request->room_no_required;
      $registration_form->save();
      return redirect()->back()->with('status', 'Successfully Updated!');

    }

    public function storeItem(Request $request)
    {
      $item_form  = ItemForm::find(1);

      $item_form->emp_name_show  = $request->emp_name_show;
      $item_form->emp_id_show = $request->emp_id_show;
      $item_form->designation_show = $request->designation_show;
      $item_form->email_show = $request->email_show;
      $item_form->phone_show = $request->phone_show;
      $item_form->building_location_show = $request->building_location_show;
      $item_form->floor_no_show = $request->floor_no_show;
      $item_form->room_no_show = $request->room_no_show;
      $item_form->product_name_show = $request->product_name_show;
      $item_form->product_name_required  = $request->product_name_required;
      
      $item_form->qty_show = $request->qty_show;
      $item_form->qty_required  = $request->qty_required;
            
      $item_form->delivery_date_show = $request->delivery_date_show;
      $item_form->delivery_date_required  = $request->delivery_date_required;

      $item_form->device_name_show = $request->device_name_show;
      $item_form->device_name_required  = $request->device_name_required;

      $item_form->pir_no_show = $request->pir_no_show;
      $item_form->pir_no_required  = $request->pir_no_required;

      $item_form->po_no_show = $request->po_no_show;
      $item_form->po_no_required  = $request->po_no_required;

      $item_form->po_amount_show = $request->po_amount_show;
      $item_form->po_amount_required  = $request->po_amount_required;

      $item_form->po_date_show = $request->po_date_show;
      $item_form->po_date_required  = $request->po_date_required;

      $item_form->warranty_years_show = $request->warranty_years_show;
      $item_form->warranty_years_required  = $request->warranty_years_required;

      $item_form->days_left_warranty_show = $request->days_left_warranty_show;
      $item_form->days_left_warranty_required  = $request->days_left_warranty_required;

      $item_form->mac_show = $request->mac_show;
      $item_form->mac_required  = $request->mac_required;

      $item_form->amc_no_show = $request->amc_no_show;
      $item_form->amc_no_required  = $request->amc_no_required;

      $item_form->amc_start_show = $request->amc_start_show;
      $item_form->amc_start_required  = $request->amc_start_required;

      $item_form->amc_end_show = $request->amc_end_show;
      $item_form->amc_end_required  = $request->amc_end_required;

      $item_form->want_amc_show = $request->want_amc_show;
      $item_form->want_amc_required  = $request->want_amc_required;

      $item_form->save();

      return redirect()->back();
    }

    public function storeTicket(Request $request)
    {
      $ticket_form  = TicketForm::find(1);
      
      $ticket_form->emp_name_show = $request->emp_name_show;
      $ticket_form->emp_name_required  = $request->emp_name_required;

      $ticket_form->emp_id_show = $request->emp_id_show;
      $ticket_form->emp_id_required  = $request->emp_id_required;

      $ticket_form->designation_show = $request->designation_show;
      $ticket_form->designation_required  = $request->designation_required;

      $ticket_form->email_show = $request->email_show;
      $ticket_form->email_required  = $request->email_required;

      $ticket_form->phone_show = $request->phone_show;
      $ticket_form->phone_required  = $request->phone_required;

      $ticket_form->building_location_show = $request->building_location_show;
      $ticket_form->building_location_required  = $request->building_location_required;

      $ticket_form->floor_no_show = $request->floor_no_show;
      $ticket_form->floor_no_required  = $request->floor_no_required;

      $ticket_form->room_no_show = $request->room_no_show;
      $ticket_form->room_no_required  = $request->room_no_required;

      $ticket_form->internal_no_show = $request->internal_no_show;
      $ticket_form->internal_no_required  = $request->internal_no_required;

      $ticket_form->under_warranty_show = $request->under_warranty_show;
      $ticket_form->under_warranty_required  = $request->under_warranty_required;

      $ticket_form->message_show = $request->message_show;
      $ticket_form->message_required  = $request->message_required;

      $ticket_form->pir_no_show = $request->pir_no_show;
      $ticket_form->pir_no_required  = $request->pir_no_required;

      $ticket_form->device_name_show = $request->device_name_show;
      $ticket_form->device_name_required  = $request->device_name_required;

      $ticket_form->mac_show = $request->mac_show;
      $ticket_form->mac_required  = $request->mac_required;

      $ticket_form->under_amc_show = $request->under_amc_show;

      $ticket_form->amc_no_show = $request->amc_no_show;
      $ticket_form->amc_no_required  = $request->amc_no_required;
      $ticket_form->save();

      return redirect()->back();
    }
}
