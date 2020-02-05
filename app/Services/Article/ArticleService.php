<?php

namespace App\Services\Article;

use App\Repositories\Article\ArticleRepository;
use App\Services\AbstractService;

class ArticleService extends AbstractService implements ArticleInterface
{
    /**
     * Initialize class properties
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->repository = $articleRepository;
        $this->paginationRowsCount = 3;
    }
}
