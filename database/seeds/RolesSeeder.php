<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

class RolesSeeder extends Seeder
{

    /**
     * Iterator
     *
     * @var int
     */
    private $iterator = 0;

    /**
     * Data for roles
     *
     * @var array
     */
    private $data = [[
        'name' => 'root',
        'slug' => 'root',
        'description' => 'Root',
        'level' => 100,
    ],[
        'name' => 'client',
        'slug' => 'client',
        'description' => 'Client',
        'level' => 10,
    ]];

    /**
     * @param Iterator|Traversable $data
     */
    private function createRole(Traversable $data): void
    {
        $data = iterator_to_array($data)[0];

        if (!Role::where('name', $data['name'])->exists()) {
            Role::create($data);
        }

    }

    /**
     * @return Generator|Traversable
     */
    private function dataProvider(): Traversable
    {
        yield $this->data[$this->iterator++];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRole($this->dataProvider());
        $this->createRole($this->dataProvider());
    }
}
