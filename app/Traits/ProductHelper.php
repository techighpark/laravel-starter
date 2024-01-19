<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Support\Facades\Log;

trait ProductHelper
{
    public function createProductHelper($title, $contents, $user): void
    {
        try {

            /** @var User $user */
            $user->posts()->create([
                'title' => $title,
                'contents' => $contents
            ]);
        } catch (ModelNotFoundException) {
            Log::debug('ModelNotFoundException');
        } catch (RelationNotFoundException) {
            Log::debug('RelationNotFoundException');
        }
    }


}
