<?php

namespace App\Http\Controllers;

use App\DTO\Tag\TagDTO;
use App\Http\Requests\Tag\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public TagService $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        $tag->news()->detach();
        return redirect()->back();
    }

    public function create(): View
    {
        return view('tags.create');
    }

    public function store(TagRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $DTO = TagDTO::from($validatedData);
        $this->tagService->storeTag($DTO);

        return redirect()->back()->with('status', 'Тэг успешно добавлен');
    }
}
