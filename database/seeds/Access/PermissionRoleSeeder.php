<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use App\Models\Access\Role\Role;
use Database\DisableForeignKeys;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.permission_role_table'));

        /*
         * Assign view backend to executive role as example
         */
        Role::find(2)->permissions()->sync([1]);
        Role::find(4)->permissions()->sync([2]);
        Role::find(5)->permissions()->sync([3]);
        Role::find(6)->permissions()->sync([4]);
        Role::find(7)->permissions()->sync([5]);


        $this->enableForeignKeys();
    }
}
