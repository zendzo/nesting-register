<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['project_code' => '71001', 'project_name' => 'YARD (PRODUCTION)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '74001', 'project_name' => 'EN 3000 (BERTH @MEB JETTY NOV 2022 AND UTILIZE MANPOWER & FACILITY)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '74002', 'project_name' => 'KP1 (STINGER AND VESSEL MODIFICATION)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73021', 'project_name' => 'PHM (JSN)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73022', 'project_name' => 'YYA PLATFORM OPTIMIZATION (PHE ONWJ)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73023', 'project_name' => 'PERTAMINA LAWE LAWE A FRAME FABRICATION (KP1)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73024', 'project_name' => 'MDK PLATFORM (HCML MAC)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73025', 'project_name' => 'MEDCO (FORE & BRONANG PLATFORM)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73028', 'project_name' => 'MEDCO (WEST BELUT)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73029', 'project_name' => 'Sisi Nubi AOI Project - Package A (AOI)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73030', 'project_name' => 'Sisi Nubi AOI Project - Package B (AOI)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73031', 'project_name' => 'MEDCO Terubuk L', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73032', 'project_name' => 'MEDCO Terubuk M', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73033', 'project_name' => 'OO-OX', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73034', 'project_name' => 'MANPATU (PHM)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73035', 'project_name' => 'SAIPEM DOUBLE JOINT', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '73036', 'project_name' => 'BLOCK B', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '74004', 'project_name' => 'EN 3000 (ENL - Utilize resources MEB for Fabrication reconstruction process of 3,000-ton floating crane boom)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '74005', 'project_name' => 'KP1 - (Extension Stinger Fabrication)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
            ['project_code' => '74006', 'project_name' => 'EN-600 (ENL Utilize resources MEB for maintenance)', 'fabrication_location' => 'Bintan', 'installation_location' => 'N/A'],
        ];

        foreach ($data as $project) {
            \App\Models\Project::create([
                'project_code' => $project['project_code'],
                'project_name' => $project['project_name'],
                'fabrication_location' => $project['fabrication_location'],
                'installation_location' => $project['installation_location'],
                'company_id' => 1,
                'contractor_id' => 1,
                'client_id' => 1,
                'description' => 'Description for project ' . $project['project_name'],
            ]);
        }
        $this->command->info('Projects table seeded!');
    }
}
