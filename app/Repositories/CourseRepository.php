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

    public function getCourseByUuid(string $identify)
    {
        return $this->course->where('uuid', $identify)->firstOrFail();
    }
    public function deleteByUuid(string $identify)
    {
        $course = $this->getCourseByUuid($identify);
        $course->delete();
    }

    public function updateCouseByUuid(string $identify, array $data)
    {
        return $this->getCourseByUuid($identify)->update($data);
    }


}
