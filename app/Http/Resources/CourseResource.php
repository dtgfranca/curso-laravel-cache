<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->name,
            'desciption'=>$this->description,
            'identify'=>$this->uuid,
            'modules'=>ModuleResource::collection($this->whenLoaded('modules')),
            'date'=> Carbon::make($this->created_at)->format('Y-m-d')
        ];
    }
}
