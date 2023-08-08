<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currentPage = $this->currentPage();
        $totalPages = $this->lastPage();
        $nextPageUrl = $this->nextPageUrl();
        $prevPageUrl = $this->previousPageUrl();

        return [
            'data' => $this->collection,
            'meta' => compact('currentPage', 'totalPages', 'nextPageUrl', 'prevPageUrl')
        ];
    }
}
