<?php
namespace App\Repositories\Faculty;

use App\Repositories\BaseRepository;

class FacultyRepository extends BaseRepository implements FacultyRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Faculty::class;
    }

    public function getFaculty()
    {
        return $this->model->select('name')->take(5)->get();
    }
}
