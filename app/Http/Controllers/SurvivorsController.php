<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Report;
use App\Models\Survivor;
use App\Models\Inventory;
use Illuminate\Http\Request;

class SurvivorsController extends Controller
{
    private $survivor;
    public function __construct(Survivor $survivor) {
        $this->survivor = $survivor;
    }
    public function index()
    {
       try{     
           return response()->json(['data' => $this->survivor->all()]);
       } catch(Exception $exception) {
            return response()->json(['Error' => $exception->getMessage()]);
        }
       
    }
    public function store(Request $request) {
        try {
            $survivorData = $request->all();
            $survivorData['infected'] == null ? $survivorData['infected']=0:$survivorData['infected']=1;
            $this->survivor->create($survivorData);
            return response()->json(["data" => "Survivor created successfully"], 201);
        } catch (Exception $exception) {
                return response()->json(['Error' => $exception->getMessage()], 404);
        }
    }
    public function show($id) {
        try {
            $survivor = Survivor::find($id);
            if (!$survivor) {
                return response()->json(['erro' => 'Survivor not exist'], 404);
            }

            $inventories = Survivor::find($id)->inventories;
            $array=[];

            $i = 0;
            foreach ($inventories as $inventory) {
                $array[$i]['description'] = Item::find($inventory->item_id)->description;
                $array[$i]['points'] = Item::find($inventory->item_id)->points;
                $i++;
            }
            $data['survivor'] = $survivor;
            $data['survivor']['inventories']= $array;
            return response()->json($data);
        } catch (Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }
    }
    public function update(Request $request, $id) {
        try {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $survivor = $this->survivor->find($id);
            $survivor->latitude = $latitude;
            $survivor->longitude = $longitude;
            $survivor->update();

            return response()->json(['data' => 'Survivor updated successfully'], 201);
        } catch (Exception $exception) {
                return response()->json(['Error' => $exception->getMessage()], 404);
        }
    }
    public function reportSurvivor($reporter, $reported) {
        $survivorReporter = Survivor::find($reporter);
        $survivorReported = Survivor::find($reported);

        switch ([$survivorReporter, $survivorReported]) {
            case [null, null]:
                return response()->json(['data' => 'both suvirvors do not exist'], 404);
            break;
            case [!null, null];
                return response()->json(['data' => 'The survivor you are reporting not exist'], 404);
            break;
            case [null, !null];
                return response()->json(['data' => 'The survivor that is reporting not exist'], 404);
            break;
            case ($survivorReporter->id == $survivorReported->id);
                return response()->json(['data' => 'You cannot auto report'], 400);
            break;
        }

        $reportCreated = Report::where('reporter_id', $reporter)->where('reported_id', $reported)->first();
        if($reportCreated) 
            return response()->json(['data' => 'You cannot report the same survivor more than one time!'], 400);
        // if not found we create new report
        $report = new Report();
        $report->reporter_id = $reporter;
        $report->reported_id = $reported;
        $report->save();

        if($survivorReported->getReportsAttribute() >= 3){
            $survivorReported->infected == 0 ? $survivorReported->infected= 1:$survivorReported->infected=1;
            $survivorReported->save();
            return response()->json(['data' => 'This survivor has been marked as infected!'], 201);
        }else{
            return response()->json(['data' => 'Survivor reported!'], 200);
        }
    }
    // Maybe somebody kills a survivor
    public function destroy($id)
    {
        Survivor::destroy($id);
    }
}
