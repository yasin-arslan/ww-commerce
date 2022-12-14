<?php

namespace App\Http\Controllers\Product\Relation\Attribute\ResourceCollection;

use App\Http\Controllers\Product\Relation\AttributeValue\ResourceCollection\AttributeValueResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResourceCollection extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'attribute_values' => AttributeValueResourceCollection::collection($this->values)
        ];
    }
}
