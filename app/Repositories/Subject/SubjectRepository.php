<?php
namespace App\Repositories\Subject;

use App\Models\Subject;
use App\Repositories\BaseRepository;
use App\Repositories\Subject\SubjectRepositoryInterface;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Subject::class;
    }

    public function getSubject()
    {
        return Subject::paginate(5);
    }
}
