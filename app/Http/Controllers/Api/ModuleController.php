<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Http\Resources\ModuleResource;

use App\Services\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    private ModuleService $moduleService;

    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
        $modules = $this->moduleService->getModulesByCourse($course);
        return ModuleResource::collection($modules);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleUpdateRequest $request, $course)
    {
        //
        $module = $this->moduleService->createNewModule($request->validated());
        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course,$identify)
    {
        $course = $this->moduleService->getModuleByCourse($course, $identify);
        return new ModuleResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleUpdateRequest $request, $course, $identify)
    {
        $this->moduleService->udpateModule($identify, $request->validated());
        return response()->json(['message'=>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->moduleService->deleteModule($identify);
        return response()->json([],204);
    }
}
