<?php

namespace App\UseCases\Repositories;

use App\Domain\Entities\Course;

interface CreateCourseRespository
{
    public function save(array $params): Course;
}
