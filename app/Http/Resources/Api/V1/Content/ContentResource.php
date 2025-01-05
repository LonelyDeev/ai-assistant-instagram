<?php

namespace App\Http\Resources\Api\V1\Content;

use App\Models\Payment;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->resource) {
            $galleries = null;

            if (optional($this->resource)->gallery && $this->resource->images_status == "end") {
                $galleries = $this->gallery()->get()->map(function ($gallery) {
                    return [
                        "id" => $gallery->id,
                        "image" => asset($gallery->image),
                        "image_link" => $gallery->image_link,
                    ];
                });
            }


            return [
                'id' => $this->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'generate_image' => $this->generate_image,
                'tools_slug' => $this->tools_slug,
                'temperature' => $this->temperature,
                'content' => $this->content,
                'language' => $this->language,
                'images_status' => $this->images_status,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'created_at_jalali' => jdate($this->created_at)->format('Y-m-d'),
                'galleries' => $galleries,
            ];
        }
       return [];
    }
}
