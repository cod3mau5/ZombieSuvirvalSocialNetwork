<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Survivor;
use App\Models\Inventory;
use Illuminate\Http\Request;

class TradesController extends Controller
{

    public static function pointsCounter($survivorInfectedId) {
        $totalPoints = 0;
        $totalItems = Inventory::where('survivor_id', $survivorInfectedId)->get();
        foreach ($totalItems as $item) {
            $quantity = $item->quantity;
            $points = Item::find($item->item_id)->points;
            $result = $quantity * $points;

            $totalPoints += $result;
        }
        return $totalPoints;
    }
    public function exchange($survivorSendId, $survivorReceiveId) {

        $survivorSend = Survivor::find($survivorSendId);
        $survivorAccept = Survivor::find($survivorReceiveId);

        $pointSurvivorSend = self::pointsCounter($survivorSend->id);
        $pointSurvivorAccept = self::pointsCounter($survivorAccept->id);

        if ($pointSurvivorAccept == 0 || $pointSurvivorSend == 0) {
            return response()->json(['Error' => 'Cannot exchange because one or both survivors dont have any points'], 200);
        }
        if ($pointSurvivorAccept != $pointSurvivorSend) {
            return response()->json(['Error' => 'Number of points are different'], 200);
        }

        switch ([$survivorSend, $survivorAccept]) {
            case ($survivorSendId == $survivorReceiveId);
                return response()->json(['Error' => 'Trying to exchange with the same suvivor'], 409);
            break;
            case [null, !null];
                return response()->json(['Error' => 'The sender survivor not exist'], 404);
            break;
            case ($survivorSend->infected == true);
                return response()->json(['Error' => 'The sender survivor is infected.'], 400);
            break;
            case [!null, null];
                return response()->json(['Error' => 'The receiver survivor not exist'], 404);
            break;
            case ($survivorAccept->infected == true);
                return response()->json(['Error' => 'The receiver survivor is infected.'], 400);
            break;
        }
        $itemsSurvivorSend = Inventory::where('survivor_id', $survivorSend->id)->get();
        $itemsSurvivorAccept = Inventory::where('survivor_id', $survivorAccept->id)->get();

        Inventory::where('survivor_id', $survivorSend->id)->delete();
        Inventory::where('survivor_id', $survivorAccept->id)->delete();

        foreach ($itemsSurvivorSend as $item) {
            $itemSurvivorAcceptExchange = new Inventory();
            $itemSurvivorAcceptExchange->survivor_id = $survivorAccept->id;
            $itemSurvivorAcceptExchange->item_id = $item->item_id;
            $itemSurvivorAcceptExchange->quantity = $item->quantity;
            $itemSurvivorAcceptExchange->save();
        }
        foreach ($itemsSurvivorAccept as $item) {
            $itemSurvivorSendExchange = new Inventory();
            $itemSurvivorSendExchange->survivor_id = $survivorSend->id;
            $itemSurvivorSendExchange->item_id = $item->item_id;
            $itemSurvivorSendExchange->quantity = $item->quantity;
            $itemSurvivorSendExchange->save();
        }
        return response()->json(['msg' => 'Exchange completed.']);
    }
}
