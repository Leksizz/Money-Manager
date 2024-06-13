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

    public function index(): View
    {
        $posts = AdminService::getNewsPaginate(5);

        return view('news.index', compact('posts'));
    }

    public function create(): View
    {
        $tags = NewsService::getTags();

        return view('news.create', compact('tags'));
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['image'] = NewsService::putImageToStorage($validatedData['image']);
        $tagIds = $validatedData['tag_ids'];
        unset($validatedData['tag_ids']);

        NewsService::storeNews($validatedData, $tagIds);

        return redirect()->back()->with('status', 'Публикация успешно добавлена!');
    }

    public function show(News $news): View
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news): View
    {
        $tags = NewsService::getTags();

        return view('news.edit', compact('news', 'tags'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['image'] = NewsService::putImageToStorage($validatedData['image']);
        $tagIds = $validatedData['tag_ids'];
        unset($validatedData['tag_ids']);

        NewsService::updateNews($validatedData, $tagIds, $news);

        return redirect()->back()->with('status', 'Публикация успешно отредактирована!');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->newsService->deleteNews($news);

        return back();
    }
}
