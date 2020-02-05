<?php
namespace App\Repositories\Article;

use App\Repositories\AbstractRepository;
use App\Models\Article;

class ArticleRepository extends AbstractRepository implements ArticleInterface
{
    /**
     * Initialize class properties
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
    }
}
