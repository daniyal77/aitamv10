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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('id_code', 10);
            $table->string('identity_serial_number', 50);
            $table->foreignId('job')->references('id')->on('salaries');
            $table->foreignId('shift_work_id')->references('id')->on('hours_of_works');
            $table->boolean('is_marriage')->default(0);
            $table->boolean('is_pay_slip')->default(0);
            $table->string('contract_type');
            $table->string('contract_number');
            $table->date('start_contract');
            $table->date('end_contract');
            $table->enum('the_end_of_service', ['1', '2', '3']);
            $table->unsignedTinyInteger('number_of_children')->default(0);
            $table->unsignedBigInteger('expertise')->default(0);
            $table->unsignedTinyInteger('overtimeـrate')->default(1);
            $table->unsignedTinyInteger('overnightـrate')->default(1);
            $table->string('personnel_id', 15);
            $table->unsignedBigInteger('employee_insurance')->default(0);
            $table->unsignedBigInteger('master_insurance')->default(0);
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('mobile1', 20);
            $table->string('mobile2', 20)->nullable();
            $table->string('mobile3', 20)->nullable();
            $table->string('bank_name');
            $table->string('bank_shabah');
            $table->string('bank_id_cart');
            $table->string('bank_hesab');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
