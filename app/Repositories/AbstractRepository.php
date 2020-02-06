<?php
namespace App\Repositories;

use App\Jobs\SaveArticle;

class AbstractRepository implements AbstractInterface
{
    /**
     * Model object
     *
     * @var object
     */
    protected $model;

    /**
     * Call SaveArticle job
     *
     * @param  array  $attributes
     * @return void
     */
    public function create(array $attributes)
    {
        dispatch(new SaveArticle($attributes));
    }

    /**
     * Paginate rows
     *
     * @param  int $rowsCount
     * @return object
     */
    public function paginate(int $rowsCount)
    {
        return $this->model->paginate($rowsCount);
    }

    /**
     * Delete row in database
     *
     * @param  int $id
     * @return void
     */
    public function delete(int $id)
    {
        $item = $this->model->findOrFail($id);
        $item->delete();
    }

    /**
     * Find row in database by id
     *
     * @param  int $id
     * @return object
     */
    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update row in database
     *
     * @param  array $attributes
     * @param  int $id
     * @return void
     */
    public function update(array $attributes, int $id)
    {
        $object = $this->model->findOrFail($id);
        $object->update($attributes);
    }
}
