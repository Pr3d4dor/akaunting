<?php

namespace App\Listeners\Update\V11;

use App\Events\Install\UpdateFinished as Event;
use App\Listeners\Update\Listener;
use App\Models\Auth\Role;
use App\Models\Auth\Permission;

class Version110 extends Listener
{
    const ALIAS = 'core';

    const VERSION = '1.1.0';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(Event $event)
    {
        // Check if should listen
        if (!$this->check($event)) {
            return;
        }

        // Create permission
        $permission = Permission::firstOrCreate([
            'name' => 'create-common-import',
            'display_name' => 'Create Common Import',
            'description' => 'Create Common Import',
        ]);

        // Attach permission to roles
        $roles = Role::all();

        foreach ($roles as $role) {
            $allowed = ['admin', 'manager'];

            if (!in_array($role->name, $allowed)) {
                continue;
            }

            $role->attachPermission($permission);
        }
    }
}
