<?php

namespace App\Http\Resources\Api\V1\User;

use App\Http\Resources\Api\V1\Address\AddressResource;
use App\Models\Payment;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'                        => $this->id,
            'mobile'                    => $this->mobile,
            'totalwordcount'            => $this->totalwordcount,
            'word_limit'                => $this->word_limit,
            'email'                     => $this->email,
            'user_type'                 => $this->type==1 ? 'admin' : 'user',
            'purchase_amount'           => $this->purchase_amount,
            'purchase_date'             => $this->purchase_date,
            'profile_photo_url'         => $this->image,
            'created_at'                => $this->created_at,
            'created_at_jalali'         => jdate($this->created_at)->format('Y-m-d'),
            'force_to_password_change'  => $this->force_to_password_change,
            'plan'                      => $this->plan(),
            'payments'                  => $this->payments(),
        ];
    }
}
