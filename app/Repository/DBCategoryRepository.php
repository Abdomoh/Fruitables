<?php

namespace App\Repository;

use App\Models\Categoriey;
use App\Models\User;
use App\RepositoryInterface\CategoryRepositoryInterFace;

class DBCategoryRepository implements CategoryRepositoryInterFace
{
    public function all()
    {
        return Categoriey::all();
    }

    public function create(array  $data)
    {

        $categories =  Categoriey::create($data);
        return $categories;
    }




    public function updateCategoriey(Categoriey $categoriey, array $data)
    {
        return Categoriey::find($categoriey);
    }
}
