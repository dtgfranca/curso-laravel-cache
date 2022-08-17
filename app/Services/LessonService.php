<?php

namespace App\Services;

use App\Models\Lesson;
use App\Repositories\LessonRepository;
use App\Repositories\ModuleRepository;

class LessonService
{


    private LessonRepository $lesson;
    private ModuleRepository $moduleRepository;

    public function __construct(LessonRepository $lesson, ModuleRepository $moduleRepository)
    {

        $this->lesson = $lesson;
        $this->moduleRepository = $moduleRepository;
    }

    public function getLessonByModule($module)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);

        return $this->lesson->getLessonByModule($module->id);
    }

    public function createNewLesson(array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);

        return $this->lesson->createNewLesson($module->id, $data);

    }
    public function getLessonByUuid($uuid)
    {
        return $this->lesson->where('uuid', $uuid)->firstOrFail();
    }

    public function updateLesson($identify, array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);
        return $this->lesson->updatelesson($module->id, $identify, $data);
    }

    public function deleteLesson($identify)
    {
        return $this->lesson->deleteLessonByUuid($identify);
    }
}
