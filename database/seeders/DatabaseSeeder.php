<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Tandarts',
                'email' => 'tandarts@smilepro.nl',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'rolename' => 'tandarts',
            ],
            [
                'name' => 'Mondhygienist',
                'email' => 'mondhygienist@smilepro.nl',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'rolename' => 'mondhygienist',
            ],
            [
                'name' => 'Assistent',
                'email' => 'assistent@smilepro.nl',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'rolename' => 'assistent',
            ],
            [
                'name' => 'Praktijkmanagement',
                'email' => 'praktijkmanagement@smilepro.nl',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'rolename' => 'praktijkmanagement',
            ],
            [
                'name' => 'Patient',
                'email' => 'patient@smilepro.nl',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'rolename' => 'patient',
            ],
            [
                'name' => 'Klant',
                'email' => 'klant@smilepro.nl',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'rolename' => 'klant',
            ],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                    'rolename' => $userData['rolename'],
                ]
            );
        }

        $this->call([
            AllergeenSeeder::class,
        ]);
    }
}
