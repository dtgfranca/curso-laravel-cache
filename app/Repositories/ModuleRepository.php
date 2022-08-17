<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    private Module $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function getModulesByCourse($id)
    {
        return $this->module->where('course_id',$id)->get();
    }

    public function createNewModule(int $courseId, array $data)
    {
        $data['course_id'] = $courseId;
        return $this->module->create($data);
    }

    public function updateModule(int $courseId, string $identify, array $data)
    {
        $module = $this->getModuleByUuid($identify);
        $data['course_id'] = $courseId;
        return $module->update($data);
    }

    public function deleteModuleByUuid($identify)
    {
        return $this->module->where('uuid', $identify)->delete();
    }

    public function getModuleByCourse($id, $identify)
    {
        return $this->module->where('curso_id',$id)->where('uuid', $identify)->firstOrFail();
    }

    /**
     * @param string $identify
     * @return mixed
     */
    public function getModuleByUuid(string $uuid)
    {
        return $this->module->where('uuid', $uuid)->firstOrFail();
    }
}
