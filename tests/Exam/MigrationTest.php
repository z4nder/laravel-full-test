<?php

namespace Tests\Exam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * Migration Test
 * - On this test we will check if you know how to:
 *
 * 1. Create migration
 * 2. Setup Columns
 * 3. Create Relationships and Indexes
 *
 * @package Tests\Feature\Exam
 */
class MigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create daily_logs table
     *
     * @test
    */
    public function create_daily_logs_table()
    {
        $this->assertTrue(
            Schema::hasTable('daily_logs')
        );
    }

    /**
     * Add columns to your table:
     * user_id : int not null
     * log: text not null
     * day: date not null
     * created_at: date not null
     * updated_at: date not null
     *
     * @test
     */
    public function create_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('daily_logs', [
                'id',
                'user_id',
                'log',
                'day',
                'created_at',
                'updated_at',
            ])
        );
    }

    /**
     * Create a foreign key that will connect user_id with users table.
     * Make sure to create an index for this column.
     *
     * @test
     */
    public function create_foreign_key_and_index()
    {
        $constrain = collect(DB::select("PRAGMA index_list(daily_logs)"))
            ->where('name', '=', 'daily_logs_user_id_index')->first();

        $this->assertNotNull(
            $constrain
        );
    }
}
