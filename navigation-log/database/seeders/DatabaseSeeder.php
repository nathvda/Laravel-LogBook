<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conversations;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Category::factory(5)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Location::factory(5)->create();
        \App\Models\Entry::factory(5)->create();
        \App\Models\EntryCategory::factory(5)->create();
        \App\Models\Friend::factory(10)->create();
        \App\Models\Conversation::factory(10)->create();
        \App\Models\UserConversation::factory(15)->create();
        \App\Models\Message::factory(150)->create();
    

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
