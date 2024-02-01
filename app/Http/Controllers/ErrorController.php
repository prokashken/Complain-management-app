<?php

namespace App\Http\Controllers;

use App\Models\Error;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function store(Request $request)
    {
        $error = new Error();
        $error->error_name = $request->error_name;
        $error->save();
        return redirect()->back();
    }
}
