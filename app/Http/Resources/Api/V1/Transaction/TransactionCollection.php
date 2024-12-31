<?php

namespace App\Http\Resources\Api\V1\Transaction;

use App\helper\helper;
use App\Models\Tools;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionCollection extends ResourceCollection
{

    public function toArray($request)
    {

        return $this->collection->map(function ($item) {
            return [
                'id'                   => $item->id,
                'plan_name'            => $item->plan_name,
                'plan_id'              => $item->plan_id,
                'amount'               => $item->amount,
                'duration'             => helper::Duration($item->duration),
                'days'                 => $item->days,
                'word_limit'           => $item->word_limit,
                'purchase_date'        => $item->purchase_date,
                'purchase_date_jalali' => jdate($item->purchase_date)->format('Y-m-d'),
                'expire_date'          => $item->expire_date,
                'expire_date_jalali'   => jdate($item->expire_date)->format('Y-m-d'),
                'created_at'           => $item->created_at,
                'created_at_jalali'    => jdate($item->created_at)->format('Y-m-d'),
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
