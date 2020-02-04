<?php
namespace App\Repositories;

interface AbstractInterface
{
    public function create(array $attributes);
    public function paginate(int $rowsCount);
    public function delete(int $id);
    public function getById(int $id);
    public function update(array $attributes, int $id);
}
