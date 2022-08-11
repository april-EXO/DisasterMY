<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Incident;
use App\Models\Incpending;

class IncidentController extends Controller
{

    function add(Request $req){
        $report = new incpending;
        $report->event = $req -> event;
        $report->location = $req -> location;
        $report->date = $req -> date;
        $report->time = $req -> time;
        $report->remark = $req -> remark;
        $report->save();
        return redirect("/");
    }

    function viewPending()
    {
        $data = Incpending::all();
        return view('pending-list',['pending'=>$data]);
    }

    function approvePending($id)
    {
        $data = Incpending::find($id);
        
        $newData = new Incident;
        $newData->event = $data -> event;
        $newData->location = $data -> location;
        $newData->date = $data -> date;
        $newData->time = $data -> time;
        $newData->remark = $data -> remark;
        $newData->save();
        $data -> delete();
        return redirect("pending");
    }

    function rejectPending($id)
    {
        $data = Incpending::find($id);
        $data -> delete();
        return redirect("pending");
    }

    function viewApproved()
    {
        $data = Incident::all();
        return view('approved-list',['approved'=>$data]);
    }

    function viewEditApproved($id)
    {
        $data = Incident::find($id);
        return view('edit-approved',['approved'=>$data]);
    }

    function editApproved(Request $req)
    {
        $data = Incident::find($req -> id);
        
        $data->event = $req -> event;
        $data->location = $req -> location;
        $data->date = $req -> date;
        $data->time = $req -> time;
        $data->remark = $req -> remark;
        $data->save();
        return redirect("approved");
    }

    function deleteApproved($id)
    {
        $data = Incident::find($id);
        $data -> delete();
        return redirect("approved");
    }
}
