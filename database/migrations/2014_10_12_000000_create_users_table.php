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
        // DB::statement("DROP TYPE IF EXISTS statut_enum");

        // DB::statement("CREATE TYPE statut_enum AS ENUM ('Actif', 'Inactif', 'Suspendu')");

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->enum('statut', ['Actif', 'Inactif', 'Suspendu'])->default('Actif');
            $table->boolean('is_approved')->default(false);
            $table->text('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // DB::statement("ALTER TABLE users ALTER COLUMN statut TYPE statut_enum USING statut::statut_enum");

        // DB::statement("ALTER TABLE users ALTER COLUMN statut SET DEFAULT 'Actif'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        // DB::statement("DROP TYPE IF EXISTS statut_enum");
    }
};
