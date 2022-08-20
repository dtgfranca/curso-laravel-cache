<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use Database\Factories\CourseFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_should_return_status_code_200_in_all_courses()
    {
        Course::factory()->count(10)->create();

        $response = $this->get('/courses');
        $response->assertStatus(200);
    }
    public function test_should_store_course()
    {
        $response = $this->postJson('/courses',[
            'title'=>fake()->sentence(12),
            'name'=>fake()->sentence(20),
            'description'=> fake()->sentence(200)
        ]);
        $response->assertStatus(201);
    }
    public function test_should_update_course()
    {
        $course = Course::factory()->create();
        $response = $this->putJson('/courses/'.$course->uuid,[
            'name'=>fake()->sentence(20),
            'description'=> fake()->sentence(200)
        ]);
        $response->assertStatus(200);
    }
    public function test_should_delete_course()
    {
        $course =  Course::factory()->create();
        $response = $this->deleteJson('/courses/'.$course->uuid);
        $response->assertNoContent();
    }
}
