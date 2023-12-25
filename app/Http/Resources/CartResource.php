<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public $message;
    public $resource;
    public $status;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function __construct($status, $message,$resource)
    {
        parent::__construct($resource);
       
        $this->status  = $status;
        $this->message = $message;
       
    }
 
    public function toArray($request)
    {
        return [
            
            "status" => $this->status,
            "message" => $this->message,
            "data" => $this->resource,
        ];
    }
}
