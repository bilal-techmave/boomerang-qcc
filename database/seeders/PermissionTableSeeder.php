<?php
namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'company-list',
            'company-add',
            'company-edit',
            'company-delete',
            'company-view',
            'department-list',
            'department-add',
            'department-edit',
            'department-delete',
            'department-view',
            'team_player-list',
            'team_player-add',
            'team_player-edit',
            'team_player-delete',
            'team_player-view',
            'contractors-list',
            'contractors-add',
            'contractors-edit',
            'contractors-delete',
            'contractors-view',
            'ticket-list',
            'ticket-add',
            'ticket-edit',
            'ticket-delete',
            'ticket-view',
            'ticket-assign',
            'ticket-slove',
            'ticket-close',
            'ticket-reopen',
            'ticket-attachment',
            'ticket-reply',
            'cleaner-list',
            'cleaner-add',
            'cleaner-edit',
            'cleaner-delete',
            'cleaner-view',
            'client-add',
            'client-edit',
            'client-delete',
            'client-view',
            'client-comment-view',
            'client-comment-add',

         ];
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
