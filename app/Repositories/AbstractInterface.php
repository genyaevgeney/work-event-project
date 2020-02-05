<?php
namespace App\Repositories;

interface AbstractInterface
{
    /**
     * Describe class create method
     *
     * @param  array $attributes
     */
    public function create(array $attributes);
    /**
     * Describe class paginate method
     *
     * @param  int $rowsCount
     */
    public function paginate(int $rowsCount);
    /**
     * Describe class delete method
     *
     * @param  int $id
     */
    public function delete(int $id);
    /**
     * Describe class getById method
     *
     * @param  int $id
     */
    public function getById(int $id);
    /**
     * Describe class update method
     *
     * @param  array $attributes
     * @param  int $id
     */
    public function update(array $attributes, int $id);
}
