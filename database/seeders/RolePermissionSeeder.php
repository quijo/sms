<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // =========================
        // PERMISSIONS
        // =========================
        $permissions = [

            // Users
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',

            // Students
            'students.view',
            'students.create',
            'students.edit',
            'students.delete',
            'students.enroll',

            // Teachers
            'teachers.view',
            'teachers.assign_subjects',
            'teachers.manage_grades',

            // Academics
            'classes.manage',
            'subjects.manage',
            'school_year.manage',

            // Grades
            'grades.view',
            'grades.encode',
            'grades.approve',

            // Finance
            'payments.view',
            'payments.create',
            'fees.manage',

            // Events
            'events.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // =========================
        // ROLES
        // =========================

        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $principal  = Role::firstOrCreate(['name' => 'principal']);
        $registrar  = Role::firstOrCreate(['name' => 'registrar']);
        $finance    = Role::firstOrCreate(['name' => 'finance']);
        $hr         = Role::firstOrCreate(['name' => 'HR']);
        $teacher    = Role::firstOrCreate(['name' => 'teacher']);
        $student    = Role::firstOrCreate(['name' => 'student']);
        $parent     = Role::firstOrCreate(['name' => 'parent']);

        // =========================
        // ASSIGN PERMISSIONS
        // =========================

        // SUPER ADMIN (ALL ACCESS)
        $superAdmin->givePermissionTo(Permission::all());

        // PRINCIPAL
        $principal->givePermissionTo([
            'users.view',
            'students.view',
            'teachers.view',
            'grades.view',
            'events.manage',
        ]);

        // REGISTRAR
        $registrar->givePermissionTo([
            'students.view',
            'students.create',
            'students.edit',
            'students.enroll',
            'classes.manage',
            'school_year.manage',
        ]);

        // FINANCE
        $finance->givePermissionTo([
            'payments.view',
            'payments.create',
            'fees.manage',
        ]);

        // HR
        $hr->givePermissionTo([
            'users.view',
            'teachers.view',
        ]);

        // TEACHER
        $teacher->givePermissionTo([
            'students.view',
            'grades.view',
            'grades.encode',
            'teachers.manage_grades',
        ]);

        // STUDENT
        $student->givePermissionTo([
            'grades.view',
        ]);

        // PARENT
        $parent->givePermissionTo([
            'grades.view',
        ]);
    }
}