<?php

namespace App\Services\Article;

use App\Repositories\Article\ArticleRepository;
use App\Services\AbstractService;

class ArticleService extends AbstractService implements ArticleInterface
{
    protected $repository;
    protected $paginationRowsCount;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->repository = $articleRepository;
        $this->paginationRowsCount = 3;
    }
}
