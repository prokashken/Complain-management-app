<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use Mail;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:every-day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update the warranty day and send email to admin and users if day < 15';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Item::chunk(100, function (Collection $items) {
            foreach ($items as $item) {
                $date = $item->delivery_date;
                $newDate    = Carbon::createFromFormat('Y-m-d', $date)->addYear($item->warranty_years);
                $now = Carbon::now();
                $dateDiff = $newDate->diffInDays($now);
                if($now->greaterThan($newDate))
                {
                    $dateDiff = - $newDate->diffInDays($now);
                }
                
                $item->update(['days_left_warranty' => $dateDiff]);
            }
        });

// for mailing admin and uses
// $admin = User::where('is_admin',0)->first();
          Item::chunk(100, function (Collection $items) {
            $admin = User::where('is_admin',0)->first();
            foreach ($items as $item) {
                if (($item->days_left_warranty <= 15) && ($item->amc_no == null)) {
                    $data['title'] = "Warranty Issue";
                    $data['name'] = $item->cat->category_name;
                    $data['product_name'] = $item->product_name;
                    $data['model_no'] = $item->model_no;
                    $data['pir_no'] = $item->pir_no;
                    $data['po_no'] = $item->po_no;
                    $data['po_date'] = $item->po_date;
                    $data['warranty_years'] = $item->warranty_years;
                    $data['emp_id'] = $item->user->emp_id;
                    $data['email'] = $item->user->email;
                    // $data['department'] = $item->user->department;
                    $data['phone'] = $item->user->phone;
                    $data['desk_no'] = $item->user->desk_no;

                     Mail::send('mailtouser&admin',['data'=>$data],function($message) use ($data,$admin){
                     $message->to($admin->email)->subject($data['title']);
                     });

                     Mail::send('mailtouser&admin',['data'=>$data],function($message) use ($data){
                     $message->to($data['email'])->subject($data['title']);
                     });

    
                }
            }
        });
    }
}
