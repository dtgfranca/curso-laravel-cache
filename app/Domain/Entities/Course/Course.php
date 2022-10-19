<?php
namespace App\Domain\Entities\Course;
use App\Domain\ValueObjects\Title;


final class Course
{
    private string $name;
    private string $description;

    private function __construct($name, $description)
    {
        $this->setName($name);
        $this->setDescription($description);
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): Course
    {
        if (strlen($name) > 5 && strlen($name) <=60) {
            $this->name = $name;
            return $this;
        }
        throw new \InvalidArgumentException('O nome do curso deve ter no mínimo 6 caracteres e no máximo 60');

    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Course
    {
        if (strlen($description) > 5 && strlen($description) <=200) {
            $this->description = $description;
            return $this;
        }
        throw new \InvalidArgumentException('A descrição do curso deve ter no mínimo 6 caracteres e no máximo 200');
    }
    public static function create(string $name, string $description): Course
    {
        return new Course($name, $description);
    }

}
