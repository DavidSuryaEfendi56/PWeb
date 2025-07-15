<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul tugas
            $table->text('description')->nullable(); // Deskripsi tugas
            $table->enum('type', ['Work', 'Personal', 'Health']); // Jenis tugas
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Medium'); // Prioritas
            $table->date('due_date')->nullable(); // Tanggal jatuh tempo
            $table->string('location')->nullable(); // Lokasi tugas
            $table->dateTime('reminder_at')->nullable(); // Waktu pengingat
            $table->boolean('is_urgent')->default(false); // Apakah mendesak
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
