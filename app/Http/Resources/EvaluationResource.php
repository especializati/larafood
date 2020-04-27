<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvaluationResource extends JsonResource
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
            'stars' => $this->stars,
            'comment' => $this->comment,
            'client' => new ClientResource($this->client),
            'order' => new OrderResource($this->order),
        ];
    }
}
