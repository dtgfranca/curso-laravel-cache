<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    private Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getAll()
    {
        return $this->course->get();
    }

    public function store(array $data)
    {
        return $this->course->create($data);
    }
}
