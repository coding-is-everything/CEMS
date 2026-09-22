<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityCategorySeeder extends Seeder
{
    /**
     * Seed the community category master data.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'General Discussion',
                'slug' => 'general-discussion',
            ],
            [
                'category_name' => 'Mining Operations',
                'slug' => 'mining-operations',
            ],
            [
                'category_name' => 'Compliance & Regulation',
                'slug' => 'compliance-regulation',
            ],
            [
                'category_name' => 'Environment',
                'slug' => 'environment',
            ],
            [
                'category_name' => 'Technology',
                'slug' => 'technology',
            ],
            [
                'category_name' => 'Help & Support',
                'slug' => 'help-support',
            ],
        ];

        $rows = array_map(fn (array $category) => array_merge($category, [
            'status' => 'ACTIVE',
        ]), $categories);

        DB::table('community_categories')->upsert(
            $rows,
            ['slug'],
            ['category_name', 'status']
        );
    }
}
