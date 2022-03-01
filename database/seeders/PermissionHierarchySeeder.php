<?php

namespace Database\Seeders;

use App\Models\PermissionHierarchy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionHierarchy::create([
            "ph_label"=>"ADMIN",
            "permission_level"=>"4"
        ]);
        PermissionHierarchy::create([
            "ph_label"=>"AUTHOR",
            "permission_level"=>"3"
        ]);
        PermissionHierarchy::create([
            "ph_label"=>"EMPLOYEE",
            "permission_level"=>"2"
        ]);
        PermissionHierarchy::create([
            "ph_label"=>"CLIENT",
            "permission_level"=>"1"
        ]);
    }
}
