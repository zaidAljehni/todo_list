<?php

use App\constants\TaskConstants;
use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Task::getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string("name", 25)
                ->nullable(false);
            $table->tinyInteger("completed", false, true)
                ->nullable(false)
                ->default(TaskConstants::COMPLETED_NO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Task::getTableName());
    }
};
