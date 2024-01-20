<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Traits\ProductHelper;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    use ProductHelper;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $result = $user->posts()->get();
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
        try {
            $user = $request->user();
            $result = $this->storeProduct(title: 'title', contents: 'contents', user: $user);
        } catch (CustomException $exception) {
            return $exception->getCustomData();
        }
        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
