<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Item;
use App\Models\Survivor;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function infectedSurvivors() {
        try {
            $totalSurvivors = Survivor::count();
            $infectedSurvivors = Survivor::where('infected', true)->count();

            $infectedSurvivors = ($infectedSurvivors / $totalSurvivors) * 100;

            return response()->json(['data' =>  'survivors infected: '.$infectedSurvivors .'%'], 200);
        } catch (Exception $exception) {
            return response()->json(['Error' => $exception->getMessage()], 200);
        }
    }

    public function notInfectedSurvivors() {
        try {
            $totalSurvivors = Survivor::count();
            $infectedSurvivors = Survivor::where('infected', false)->count();

            $infectedSurvivors = ($infectedSurvivors / $totalSurvivors) * 100;

            return response()->json(['data' => 'survivors not infected: ' . $infectedSurvivors .'%'], 200);
        } catch (Exception $exception) {
            return response()->json(['Error' => $exception->getMessage()], 200);
        }
    }

    public function averageItems() {
        try {
            $totalSurvivors = Survivor::count();
            $items = Item::all();
            $data = array();
            foreach ($items as $item) {
                $totalItems = Inventory::where('item_id', $item->id)->sum('quantity');
                $data[$item->name] = $totalItems / $totalSurvivors;
            }

            return response()->json(['data' => $data], 200);
        } catch (Exception $exception) {
            return response()->json(['Error' => $exception->getMessage()]);
        }
    }

    public function pointsLost($reported_id) {
        try {
            $survivorLost = Survivor::find($reported_id);
            if (!$survivorLost) {
                return response()->json(['message' => 'Survivor not found'], 404);
            }

            if ($survivorLost->infected == false) {
                return response()->json(['message' => 'Survivor founded and not infected'], 400);
            }

            $countPointsSurvivorLost = 0;
            $totalInventories = Inventory::where('survivor_id', $reported_id)->get();

            foreach ($totalInventories as $item) {
                $quantity = $item->quantity;
                $points = Item::find($item->item_id)->points;
                $result = $quantity * $points;

                $countPointsSurvivorLost += $result;
            }

            return response()->json(['pointsLost' => $countPointsSurvivorLost], 200);
        } catch (Exception $exception) {
            return response()->json(['Error' => $exception->getMessage()]);
        }
    }
}
