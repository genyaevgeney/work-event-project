<?php
namespace App\Services;
class AbstractService implements AbstractInterface
{
	protected $repository;
	protected $paginationRowsCount;

	public function create(array $data)
    {
    	return $this->repository->create($data);
    }

    public function paginate()
    {
        return $this->repository->paginate($this->paginationRowsCount);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }

    public function update(array $data, int $id)
    {
      $this->repository->update($data, $id);
    }
}