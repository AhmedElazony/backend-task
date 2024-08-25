<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Storage;
use Str;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::with('images')->paginate()
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $article = Article::create([
            'title' => $data['title']
        ]);

        $this->uploadArticleImages($article, $data['images']);

        return back()->with('success', 'article created succefully');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article->load('images')
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        $article->update([
            'title' => $data['title']
        ]);

        $this->deleteArticleImages($article->images);

        $this->uploadArticleImages($article, $data['images']);

        return back()->with('success', 'article updated successfully');
    }

    public function destroy(Article $article)
    {
        $this->deleteArticleImages($article->images);

        $article->delete();

        return back()->with('success', 'article deleted successfully');
    }

    private function uploadArticleImages($article, $images)
    {
        foreach ($images as $image) {
            $imageName = now()->format('y-m-d-H-i-s') . '-' . Str::uuid() . '.' . $image->extension();
            $imageUrl = $image->storeAs('images', $imageName, 'public');

            $article->images()->create([
                'image_url' => $imageUrl
            ]);
        }
    }

    private function deleteArticleImages($images)
    {
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_url);

            $image->delete();
        }

    }
}
