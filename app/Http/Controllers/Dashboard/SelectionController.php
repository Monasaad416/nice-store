<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SelectionController extends Controller
{
    public function selectUserType()
    {
        return view('dashboard.pages.selection.index');
    }

}
