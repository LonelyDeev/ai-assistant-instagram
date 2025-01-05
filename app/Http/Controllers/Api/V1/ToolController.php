<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Tool\ToolCollection;
use App\Models\Tools;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $plans = Tools::where('active',1)->get();
        return $this->respondWithResourceCollection(new ToolCollection($plans));
    }
}
