<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Repository\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    private $commentRepository;
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $relations = ['user'];
            $comments = $this->commentRepository->all($relations);
            return $this->sendResponse(
                $comments,
                'Comments retrieved successfully.'
            );
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        try {
            $input = $request->all();
            $comment = $this->commentRepository->create($input);
            return $this->sendResponse(
                $comment,
                'Comment created successfully.'
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
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        try {
            $input = $request->all();
            $comment = $this->commentRepository->update($comment->id, $input);
            return $this->sendResponse(
                $comment,
                'Comment updated successfully.'
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
    public function destroy(Comment $comment)
    {
        try {
            $this->commentRepository->deleteById($comment->id);
            return $this->sendResponse(
                $comment,
                'Comment deleted successfully.'
            );
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
