<?php


namespace App\RepositoryInterface;

use App\Models\Categoriey;

interface CategoryRepositoryInterFace
{
    public function all();
    public function create(array $data);
   // public function update(array $data, $id);
    public function updateCategoriey(Categoriey $categoriey, array $data);
}
