<?php

namespace App\Http\Controllers;

use App\Models\Makepdf;
use App\Models\Ticket;
use Illuminate\Http\Request;
use PDF;

class MakepdfController extends Controller
{
     // Display user data in view
     public function showData(Request $request){

        $makepdf = Makepdf::find(1);
        // if ($request->form != null) {
        //   $makepdf->from = $request->from;
        // }
        // else{
        //   $makepdf->from = "No filter used";
        // }
  
        // if ($request->to != null) {
        //   $makepdf->to = $request->to;
        // }
        // else{
        //   $makepdf->to = "No filter used";s
        // }
        $makepdf->from = $request->from;
        $makepdf->to = $request->to;
        $makepdf->notDone = $request->notDone;
        $makepdf->partialyDone = $request->partialyDone;
        $makepdf->done = $request->done;
        $makepdf->closed = $request->closed;
        $makepdf->save();
        $data = Makepdf::find(1);

        // if ($request->form != null && $request->to != null) {
          $notDone = Ticket::where('status',0)
          ->when($request->from, function($query) use ($request){
              return $query->whereDate('created_at','>=',$request->from);
          })
          ->when($request->to, function($query) use ($request){
              return $query->whereDate('created_at','<=',$request->to);
          })
          ->get();
  
          $partialyDone = Ticket::where('status',1)
          ->when($request->from, function($query) use ($request){
              return $query->whereDate('created_at','>=',$request->from);
          })
          ->when($request->to, function($query) use ($request){
              return $query->whereDate('created_at','<=',$request->to);
          })
          ->get();
  
          $done = Ticket::where('status',2)
          ->when($request->from, function($query) use ($request){
              return $query->whereDate('created_at','>=',$request->from);
          })
          ->when($request->to, function($query) use ($request){
              return $query->whereDate('created_at','<=',$request->to);
          })
          ->get();

          $closed = Ticket::where('status',3)
          ->when($request->from, function($query) use ($request){
              return $query->whereDate('created_at','>=',$request->from);
          })
          ->when($request->to, function($query) use ($request){
              return $query->whereDate('created_at','<=',$request->to);
          })
          ->get();
        // }

        if ($notDone == null) {
          $notDone = [];
        }
        if ($partialyDone == null) {
          $partialyDone = [];
        }
        if ($done == null) {
          $done = [];
        }
        if ($closed == null) {
          $closed == [];
        }


        return view('admin.pdf',compact('data','notDone','partialyDone','done','closed'));
      }
      // Generate PDF
      public function createPDF(Request $request) {

        $notDone = Ticket::where('status',0)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->get();

        $partialyDone = Ticket::where('status',1)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->get();

        $done = Ticket::where('status',2)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->get();

        $closed = Ticket::where('status',3)
        ->when($request->from, function($query) use ($request){
            return $query->whereDate('created_at','>=',$request->from);
        })
        ->when($request->to, function($query) use ($request){
            return $query->whereDate('created_at','<=',$request->to);
        })
        ->get();
      // }

      if ($notDone == null) {
        $notDone = [];
      }
      if ($partialyDone == null) {
        $partialyDone = [];
      }
      if ($done == null) {
        $done = [];
      }
      if ($closed == null) {
        $closed == [];
      }

        $anyVariable = 1;
         // retreive all records from db
      $data = Makepdf::find(1);
      // share data to view
      view()->share('data',$data);
      $pdf = PDF::loadView('admin.pdf', compact('data','anyVariable','notDone','partialyDone','done','closed'));
      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
      }
}
