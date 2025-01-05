<?php

namespace App\Http\Resources\Api\V1\Tool;

use App\Models\Tools;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ToolCollection extends ResourceCollection
{

    public function toArray($request)
    {

        return $this->collection->map(function ($tool) {
            return [
                'id'                   => $tool->id,
                'name'                 => $tool->name,
                'slug'                 => $tool->slug,
                'description'          => $tool->description,
                'created_at'           => $tool->created_at,
                'created_at_jalali'    => jdate($tool->created_at)->format('Y-m-d'),
            ];
        });
    }

}
