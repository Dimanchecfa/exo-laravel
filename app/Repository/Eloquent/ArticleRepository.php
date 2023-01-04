<?php

namespace App\Repository\Eloquent;

use App\Models\Article;
use App\Repository\ArticleRepositoryInterface;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Article $model)
    {
        $this->model = $model;
    }
}
