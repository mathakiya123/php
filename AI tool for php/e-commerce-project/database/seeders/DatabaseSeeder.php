<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Admin credentials
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        // Dummy Categories to kickstart development
        $categories = ['Electronics', 'Fashion', 'Home & Garden', 'Sports'];
        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat], ['slug' => Str::slug($cat)]);
        }
    }
}
