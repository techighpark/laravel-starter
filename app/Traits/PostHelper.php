<?php

namespace App\Traits;

use App\Exceptions\CustomException;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

trait PostHelper
{


    /**
     * @throws CustomException
     */
    public function indexPosts($user): array
    {

        try {
            $result = $user->posts()->get();
        } catch (ModelNotFoundException) {
            throw new CustomException("데이터를 찾을 수 없습니다.", 400);
        }

        return ['posts' => $result];
    }

    /**
     * @throws CustomException
     */
    public function storePost($title, $contents, $user): array
    {

        try {
            /** @var User $user */
            $post = $user->posts()->create([
                'title' => $title,
                'contents' => $contents
            ]);
        } catch (ModelNotFoundException) {
            throw new CustomException("데이터를 찾을 수 없습니다.", 400);
        } catch (RelationNotFoundException) {
            throw new CustomException("게시물을 찾을 수 없습니다.", 401);
        }

        return ['postId' => $post->getAttribute('id')];
    }

    /**
     * @throws CustomException
     */
    public function showPost($id): Model|Collection|Builder|array|null
    {
        try {

            $result = Post::query()->findOrFail($id);
        } catch (ModelNotFoundException) {
            throw new CustomException("데이터를 찾을 수 없습니다.", 400);
        }
        return $result;

    }

    public function editPost()
    {

    }

    public function updatePost()
    {

    }

    public function destroyPost()
    {

    }

}
