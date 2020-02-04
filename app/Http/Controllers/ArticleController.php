<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\Http\Requests\UpdateNews;
use App\Services\Article\ArticleService;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        // return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNews $request, int $id)
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
