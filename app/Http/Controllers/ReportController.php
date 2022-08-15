<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Event;


class ReportController extends Controller
{
	function getData()
	{
		$data = Report::all();
		return view('welcome', ['report' => $data]);
	}

	function addReport(Request $req)
	{
		$report = new Report;
		$report->type = $req->type;
		$report->latitude = $req->latitude;
		$report->longitude = $req->longitude;
		$report->time = $req->time;
		$report->date = $req->date;
		$report->location = $req->location;
		$report->message = $req->message;
		$report->save();
		return redirect("/");
	}

	function viewReport()
	{
		$data = Report::all();
		return view('report', ['report' => $data]);
	}

	function approveReport($id)
	{
		$data = Report::find($id);

		$newData = new Event;
		$newData->type = $data->type;
		$newData->latitude = $data->latitude;
		$newData->longitude = $data->longitude;
		$newData->time = $data->time;
		$newData->date = $data->date;
		$newData->message = $data->message;
		$newData->save();
		$newData->save();
		$data->delete();
		return redirect("report");
	}

	function rejectReport($id)
	{
		$data = Report::find($id);
		$data->delete();
		return redirect("report");
	}

	function viewEvent()
	{
		$data = Event::all();
		return view('disasterlist', ['approved' => $data]);
	}

	function viewEditEvent($id)
	{
		$data = Event::find($id);
		return view('edit-approved', ['approved' => $data]);
	}

	function editEvent(Request $req)
	{
		$data = Event::find($req->id);

		$data->event = $req->event;
		$data->location = $req->location;
		$data->date = $req->date;
		$data->time = $req->time;
		$data->location = $req->location;
		$data->remark = $req->remark;
		$data->save();
		return redirect("edit-approved");
	}

	function deleteEvent($id)
	{
		$data = Event::find($id);
		$data->delete();
		return redirect("disasterlist");
	}
}