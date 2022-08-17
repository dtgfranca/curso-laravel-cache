<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{
    private Lesson $lesson;

    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function getLessonByModule($id)
    {
       return  $this->lesson->where('module_id',$id)->get();
    }

    public function createNewLesson(int $moduleId, array $data)
    {
        $data['module_id'] = $moduleId;
        return $this->lesson->create($data);
    }

    public function updatelesson(int $moduleId, string $identify, array $data)
    {
        $lesson = $this->getLessonByUuid($identify);
        $data['module_id'] = $moduleId;
        return $lesson->update($data);

    }

    private function getLessonByUuid(string $identify)
    {
        return $this->lesson->where('uuid', $identify)->firstOrFail();
    }

    public function deleteLessonByUuid($identify)
    {
        return $this->lesson->where('uuid', $identify)->delete();
    }
}
