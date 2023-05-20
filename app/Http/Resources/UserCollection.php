<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class UserCollection extends ResourceCollection
{
    public $collects = UserResource::class;

    /**
     * @param Request $request
     * @return array<string, Collection>
     */
    public function toArray(Request $request): array
    {
        return [
          'data' => $this->collection,
        ];
    }
}
