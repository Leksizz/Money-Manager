<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\NewsRequest;
use App\Models\News;
use App\Services\AdminService;
use App\Services\NewsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsController extends Controller
{

    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = AdminService::getNewsPaginate(5);

        return view('news.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tags = NewsService::getTags();

        return view('news.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['image'] = NewsService::putImageToStorage($validatedData['image']);
        $tagIds = $validatedData['tag_ids'];
        unset($validatedData['tag_ids']);

        NewsService::storeNews($validatedData, $tagIds);

        return redirect()->back()->with('status', 'Публикация успешно добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        $tags = NewsService::getTags();

        return view('news.edit', compact('news', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['image'] = NewsService::putImageToStorage($validatedData['image']);
        $tagIds = $validatedData['tag_ids'];
        unset($validatedData['tag_ids']);

        NewsService::updateNews($validatedData, $tagIds, $news);

        return redirect()->back()->with('status', 'Публикация успешно отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        $this->newsService->deleteNews($news);

        return back();
    }
}
