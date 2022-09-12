<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Event;
use App\Http\Controllers\ExternalController;
use App\Models\RWData;

class ReportController extends Controller
{
	function getData()
	{
		$data = Report::where('status', 'approved')->get();
		$RWdata = RWData::all();

		return view('welcome', ['report' => $data])
		->with('rw', $RWdata);
	}

	function getDataNR()
	{
		$data = Report::where('status', 'approved')->get();
		$RWdata = RWData::all();

		return view('news', ['report' => $data])
		->with('rw', $RWdata);
	}

	function addReport(Request $req)
	{
		$report = new Report;
		$report->type = $req->type;
		$report->latitude = $req->latitude;
		$report->longitude = $req->longitude;
		$report->locatedlatlng = $req->locatedlatlng;
		$report->time = $req->time;
		$report->date = $req->date;
		$report->location = $req->location;
		$report->message = $req->message;
		$report->status = $req->status;
		$report->save();
		return redirect("/");
	}

	function viewPendingReport()
	{
		$data = Report::where('status', 'pending')->orWhere('status', 'rejected')->orderBy('created_at', 'DESC')->get();
		return view('/', ['pending' => $data]);
	}

	function approvePendingReport($id)
	{
		$data = Report::find($id);
		$data->status = "approved";
		$data->save();

		$newData = new Event;
		$newData->type = $data->type;
		$newData->latitude = $data->latitude;
		$newData->longitude = $data->longitude;
		$newData->locatedlatlng = $data->locatedlatlng;
		$newData->time = $data->time;
		$newData->date = $data->date;
		$newData->location = $data->location;
		$newData->message = $data->message;
		$newData->save();
		return redirect("/home");
	}

	function rejectPendingReport($id)
	{
		$data = Report::find($id);
		$data->status = "rejected";
		$data->save();
		return redirect("/home");
	}

}
