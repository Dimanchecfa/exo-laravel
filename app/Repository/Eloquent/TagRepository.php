<?php

namespace App\Repository\Eloquent;

use App\Models\Tag;
use App\Repository\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
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
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
}
