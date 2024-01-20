<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Traits\PostHelper;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    use PostHelper;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        try {
            $result = $this->indexPosts(user: $user);
        } catch (CustomException $e) {
//            return response($e->getCustomData(), 400);
            return $e->getCustomData();
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        try {
            $result = $this->storePost(title: 'title', contents: 'contents', user: $user);
        } catch (CustomException $e) {
            return $e->getCustomData();
        }
        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $result = $this->showPost(id: $id);
        } catch (CustomException $e) {
            return $e->getCustomData();
        }

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
