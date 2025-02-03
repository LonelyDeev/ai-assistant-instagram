<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Tool\ToolCollection;
use App\Http\Resources\Api\V1\Transaction\TransactionCollection;
use App\Models\Tools;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function index(Request $request)
    {
        $items = $request->user()->transactions()->paginate(20);
        return $this->respondWithResourceCollection(new TransactionCollection($items));
    }
}
