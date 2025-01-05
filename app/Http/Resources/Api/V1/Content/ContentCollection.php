<?php

namespace App\Http\Resources\Api\V1\Content;

use App\Models\Tools;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return $this->collection->map(function ($content) {

            $galleries = null;

            if ($content->gallery && $content->images_status == "end") {
                $galleries = $content->gallery()->get()->map(function ($gallery) {
                    return [
                        "id" => $gallery->id,
                        "image" => asset($gallery->image),
                        "image_link" => $gallery->image_link,
                    ];
                });
            }

            return [
                'id'                   => $content->id,
                'title'                => $content->title,
                'slug'                 => $content->slug,
                'generate_image'       => $content->generate_image,
                'tools_slug'           => $content->tools_slug,
                'temperature'          => $content->temperature,
                'content'              => $content->content,
                'language'             => $content->language,
                'images_status'        => $content->images_status,
                'status'               => $content->status,
                'created_at'           => $content->created_at,
                'created_at_jalali'    => jdate($content->created_at)->format('Y-m-d'),
                'galleries'            => $galleries,
            ];
        });
    }

}
