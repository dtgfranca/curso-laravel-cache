<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{
    private ModuleRepository $moduleRepository;
    private CourseRepository $courseRepository;

    public function __construct(ModuleRepository $moduleRepository, CourseRepository $courseRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse($course)
    {
        $course = $this->courseRepository->getCourseByUuid($course);
        return $this->moduleRepository->getModulesByCourse($course->id);

    }

    public function createNewModule(array $array)
    {
        $course = $this->courseRepository->getCourseByUuid($array['course']);
        return $this->moduleRepository->createNewModule($course->id, $array);
    }

    public function getModuleByCourse($course, $identify)
    {
        $course = $this->courseRepository->getCourseByUuid($course);
        return $this->moduleRepository->getModuleByCourse($course->id, $identify);
    }

    public function udpateModule( string $identify, array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);
        return $this->moduleRepository->updateModule($course->id,$identify, $data);
    }

    public function deleteModule($identify)
    {
        return $this->moduleRepository->deleteModuleByUuid($identify);
    }
}
