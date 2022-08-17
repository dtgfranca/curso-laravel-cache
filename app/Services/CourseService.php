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

    public function store(array $data)
    {
        return $this->courseRepository->store($data);
    }

    public function get(string $identify)
    {
        $this->courseRepository->getCourseByUuid($identify);
    }

    public function deleteCourse(string $identify)
    {
        return $this->courseRepository->deleteByUuid($identify);
    }

    public function udpate(string $identify, array $data)
    {
        return $this->courseRepository->updateCouseByUuid($identify, $data);
    }

}
