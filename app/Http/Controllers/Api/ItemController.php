<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
class ItemController extends Controller
{
  public function index(){
     
      $item = Item::get()->groupBy('type');
      $payload = [
          'code' => 200,
          'app_message' => 'successful',
          'user_message' => "Management Data Load",
          'data' => $item
      ];
      return response()->json($payload, 200);
  }  
}
