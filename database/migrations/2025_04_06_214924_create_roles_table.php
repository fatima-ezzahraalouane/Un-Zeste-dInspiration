<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE TYPE role_user AS ENUM ('Client', 'Chef', 'Admin')");

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name_user')->unique();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE roles ALTER COLUMN name_user TYPE role_user USING name_user::role_user");

        DB::statement("ALTER TABLE roles ALTER COLUMN name_user SET NOT NULL");

        DB::table('roles')->insert([
            ['name_user' => 'Client'],
            ['name_user' => 'Chef'],
            ['name_user' => 'Admin'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        DB::statement("DROP TYPE IF EXISTS role_user");    }
};
