<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Repository\ArticleRepositoryInterface;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    private $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = request()->get('page', 1);
        $search = request()->get('title', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        try {
            $input = $request->all();
            $article = $this->articleRepository->create($input);
            return $this->sendResponse(
                $article,
                'Article created successfully.'
            );
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        try {
            $input = $request->all();
            $article = $this->articleRepository->update($article->id, $input);
            return $this->sendResponse(
                $article,
                'Article updated successfully.'
            );
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            $article = $this->articleRepository->deleteById($article->id);
            return $this->sendResponse(
                $article,
                'Article deleted successfully.'
            );
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
