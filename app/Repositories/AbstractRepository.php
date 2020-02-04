<?php
namespace App\Repositories;

use App\Jobs\SaveArticle;

class AbstractRepository implements AbstractInterface
{
    protected $model;

    public function create(array $attributes)
    {
        dispatch(new SaveArticle($attributes));
    }

    public function paginate(int $rowsCount)
    {
        return $this->model->paginate($rowsCount);
    }

    public function delete(int $id)
    {
        $item = $this->model->findOrFail($id);
        $item->delete();
    }

    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $attributes, int $id)
    {
        $object = $this->model->findOrFail($id);
        $object->update($attributes);
    }
}
