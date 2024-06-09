<?php

namespace App\Services;

use App\DTO\Tag\TagDTO;
use App\Models\Tag;

class TagService
{
    public function storeTag(TagDTO $DTO): void
    {
        Tag::firstOrCreate([
            'name' => $DTO->name,
        ]);
    }
}
