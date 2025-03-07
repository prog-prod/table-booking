<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'table' => new TableResource($this->whenLoaded('table')),
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'booking_time' => $this->booking_time->format('d.m.Y H:i:s'),
            'guest_count' => $this->guest_count,
        ];
    }
}
