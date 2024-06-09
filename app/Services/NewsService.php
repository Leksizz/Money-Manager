<?php

namespace App\Services;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    public static function putImageToStorage($image): string
    {
        return $image->store('images', 'public');
    }

    public static function storeNews(mixed $data, mixed $tagIds): void
    {
        $news = News::firstOrCreate($data)->tags()->attach($tagIds);
    }

    public static function getTags(): Collection
    {
        return Tag::all();
    }

    public static function updateNews(mixed $data, mixed $tagIds, News $news): void
    {
        $news->update($data);
        $news->tags()->sync($tagIds);
    }

    public function deleteNews(News $news): void
    {
        $news->tags()->detach();
        $news->delete();
    }
}
