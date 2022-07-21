<?php
namespace App\Services;
use App\Repositories\CourseRepository;

class CourseService
{
    private CourseRepository $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAll()
    {
        return $this->courseRepository->getAll();
    }

}
