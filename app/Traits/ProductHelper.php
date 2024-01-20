<?php

namespace App\Traits;

use App\Exceptions\CustomException;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

trait ProductHelper
{


    public function indexProducts()
    {

    }

    /**
     * @throws CustomException
     */
    public function storeProduct($title, $contents, $user): array
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

    public function editProduct()
    {

    }

    public function updateProduct()
    {

    }

}
