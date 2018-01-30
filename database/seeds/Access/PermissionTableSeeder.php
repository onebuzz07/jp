<?php

use Carbon\Carbon;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class PermissionTableSeeder.
 */
class PermissionTableSeeder extends Seeder
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
        $this->truncateMultiple([config('access.permissions_table'), config('access.permission_role_table')]);

        /**
         * Don't need to assign any permissions to administrator because the all flag is set to true
         * in RoleTableSeeder.php.
         */

        /**
         * Misc Access Permissions.
         */
        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'view-backend';
        $viewBackend->display_name = 'View Backend';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'sales-marketing';
        $viewBackend->display_name = 'View Sales Marketing';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'planning';
        $viewBackend->display_name = 'View Planning';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'ctp';
        $viewBackend->display_name = 'View CTP';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'printing';
        $viewBackend->display_name = 'View Printing';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'edit-sales';
        $viewBackend->display_name = 'Edit Sales Marketing';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'edit-plan';
        $viewBackend->display_name = 'Edit Planning';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'edit-ctp';
        $viewBackend->display_name = 'Edit CTP';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'edit-print';
        $viewBackend->display_name = 'Edit Printing';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'delete-sales';
        $viewBackend->display_name = 'Delete Sales Marketing';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'delete-plan';
        $viewBackend->display_name = 'Delete Planning';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'delete-ctp';
        $viewBackend->display_name = 'Delete CTP';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'delete-printing';
        $viewBackend->display_name = 'Delete Printing';
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $this->enableForeignKeys();
    }
}
