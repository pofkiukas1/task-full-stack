<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'lname'=>$this->lname,
            'email'=>$this->email,
            'address'=>$this->address
        ];
    }
   /* public function with($request)
    {
        return[
            'version' => '1.0.0',
            'author_url' => url('http://testcancer.com')
        ];
    }*/
}
