<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            // Foreign key to users table with cascade on delete
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Nullable profile columns
            $table->date('date_of_birth')->nullable()->default(null);
            $table->enum('gender', ['male', 'female'])->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('profile_picture')->nullable()->default(null);

            //used for auditing
            $table->string('created_by')->nullable()->default(null);
            $table->string('updated_by')->nullable()->default(null);

            // Add soft deletes and timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
};
