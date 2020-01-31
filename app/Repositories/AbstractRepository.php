<?php
namespace App\Repositories;

class AbstractRepository implements AbstractInterface
{
    protected $model;

    public function create(array $attributes)
    {
        $data = $this->model->create($attributes);
        return $data;
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

    public function read(int $id)
    {
        return $this->model->findOrFail($id);
    }
}
