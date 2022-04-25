<?php
namespace App\Repositories\Faculty;

use App\Models\Faculty;
use App\Repositories\BaseRepository;


class FacultyRepository extends BaseRepository implements FacultyRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Faculty::class;
    }

    public function getFaculty()
    {
        return Faculty::paginate(5);
    }
}
