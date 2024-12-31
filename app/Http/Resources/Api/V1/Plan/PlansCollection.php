<?php

namespace App\Http\Resources\Api\V1\Plan;

use App\helper\helper;
use App\Models\Tools;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlansCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return $this->collection->map(function ($item) {

            return [
                'id'                   => $item->id,
                'name'                 => $item->name,
                'description'          => $item->description,
                'price'                => $item->price,
                'duration'             => helper::Duration($item->duration),
                'word_limit'           => $item->word_limit,
                'created_at'           => $item->created_at,
                'created_at_jalali'    => jdate($item->created_at)->format('Y-m-d'),
                'features'              => explode("|", $item->features),
                'tools_limit'          => $this->Tools($item->tools_limit),
            ];
        });
    }

    private function tools($tool_ids)
    {
        $tool_ids=explode(",",$tool_ids);
        return Tools::whereIn('id',$tool_ids)->where('active',1)->get();
    }

}
