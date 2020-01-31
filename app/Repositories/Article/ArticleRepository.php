<?php
namespace App\Repositories\Article;

use App\Repositories\AbstractRepository;
use App\Models\Article;

class ArticleRepository extends AbstractRepository implements ArticleInterface
{
    public function __construct(Article $article)
    {
        $this->model = $article;
    }
}
