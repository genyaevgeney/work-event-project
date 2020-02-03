<?php
namespace App\Services;
interface AbstractInterface
{
	public function create(array $data);

	public function paginate();

	public function update(array $data, int $id);

	public function delete(int $id);

	public function read(int $id);
}