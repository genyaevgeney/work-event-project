<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\Services\Article\ArticleService;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * ArticleService class object
     *
     * @var object
     */
    protected $articleService;

    /**
     * Initialize class properties
     *
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNews  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request)
    {
        $validated = $request->validated();
        $this->articleService->create($validated);
        return response()->json('Article has been created succesfully', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->articleService->paginate();
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->articleService->getById($id);
        return new ArticleResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNews  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNews $request, int $id)
    {
        $validated = $request->validated();
        $this->articleService->update($validated, $id);
        return response()->json('Article has been updated succesfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->articleService->delete($id);
        return response()->json('Deleted successfully', 200);
    }
}
