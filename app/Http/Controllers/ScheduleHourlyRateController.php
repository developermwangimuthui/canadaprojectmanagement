<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleHourlyRateRequest;
use App\Http\Resources\ScheduleHourlyRateResource;
use App\Models\ScheduleHourlyRate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class ScheduleHourlyRateController extends Controller
{
    public function index()
    {
        $allschedulehourlyrate = ScheduleHourlyRate::all();
        $schedulehourlyrate = ScheduleHourlyRateResource::collection($allschedulehourlyrate);
        return response([
            'error' => False,
            'message' => 'Success',
            'schedulehourlyrate' => $schedulehourlyrate
        ], Response::HTTP_OK);
    }

    public function store(ScheduleHourlyRateRequest $request)
    {
        $schedulehourlyrate = new ScheduleHourlyRate();
        $schedulehourlyrate->project_id = $request->input('project_id');
        $schedulehourlyrate->type = $request->input('type');
        $schedulehourlyrate->pesd = $request->input('pesd');
        $schedulehourlyrate->comment = $request->input('comment');
        $schedulehourlyrate->rate = $request->input('rate');
        $schedulehourlyrate->unit = $request->input('unit');
        $schedulehourlyrate->save();
        $id = $schedulehourlyrate->id;

        $allschedulehourlyrate = ScheduleHourlyRate::where('id',$id)->get();
        $schedulehourlyrate = ScheduleHourlyRateResource::collection($allschedulehourlyrate);
        return response([
            'error' => False,
            'message' => 'Success',
            'schedulehourlyrate' => $schedulehourlyrate
        ], Response::HTTP_OK);

    }
}
