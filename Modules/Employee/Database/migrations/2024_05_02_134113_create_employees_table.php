<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('personal_id')->unsigned();
            $table->string('id_code', 10);
            $table->boolean('is_marriage')->default(false);
            $table->enum('the_end_of_service', ['YES', 'NO', 'WOMEN']);
            $table->string('child_number');
            $table->foreignId('pay_slip');
            $table->boolean('is_pay_slip')->default(false);
            $table->enum('contract_type', ['daily_worker', 'temporary', 'human']);
            $table->string('contract_number');
            $table->date('start_contract');
            $table->date('end_contract');
            $table->unsignedBigInteger('expertise')->default(0);
            $table->unsignedBigInteger('severance_pay')->default(0);
            $table->unsignedTinyInteger('overestimate')->default(1);
            $table->string('insurance_number');
            $table->integer('personnel_number')->unsigned()->unique();
            $table->unsignedBigInteger('employee_insurance')->default(0);
            $table->unsignedBigInteger('master_insurance')->default(0);
            $table->unsignedBigInteger('supplementary_insurance')->default(0);
            $table->string('bank_name');
            $table->string('bank_shabah');
            $table->string('bank_id_cart');
            $table->string('bank_hesab');
            $table->foreignId('user_id');
            $table->softDeletes();
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
