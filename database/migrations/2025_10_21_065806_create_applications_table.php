<?php
// database/migrations/2024_01_01_000002_create_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('course_name', [
                'Основы алгоритмизации и программирования',
                'Основы веб-дизайна',
                'Основы проектирования баз данных'
            ]);
            $table->date('start_date');
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->enum('status', ['new', 'in_progress', 'completed'])->default('new');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
