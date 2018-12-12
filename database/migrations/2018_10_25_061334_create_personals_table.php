<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prename_th');
            $table->string('fname_th', 100);
            $table->string('lname_th', 150);
            $table->string('prename_en', 10)->nullable();
            $table->string('nickname', 50)->nullable();
            $table->string('fname_en', 100)->nullable();
            $table->string('lname_en', 150)->nullable();
            $table->string('affiliation');
            $table->string('citizen_id', 13);
            $table->string('official_id')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('position_status')->nullable();
            $table->enum('status',['รอบรรจุ','ปกติ', 'พ้นจากส่วนราชการ'])->default('ปกติ');            
            $table->date('birth');
            $table->string('birth_place')->nullable();
            $table->string('hometown')->nullable();
            $table->enum('physical', ['ปกติ', 'พิการ'])->default('ปกติ');
            $table->string('bloods')->nullable();
            $table->string('blame')->nullable();
            $table->string('religion')->nullable();
            $table->date('official_date');
            $table->string('first_office')->nullable();
            $table->date('work_date');
            $table->string('married_status');
            $table->string('position_level');
            $table->string('move_type')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('phone_house')->nullable();
            $table->string('phone_office')->nullable();
            $table->string('phone_mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('folder_no')->nullable();
            $table->string('email')->nullable();
            $table->string('banking_no')->nullable();
            $table->enum('coopertive', [0,1])->default(0);
            $table->string('coop_no')->nullable();
            $table->enum('pension_fund', [0,1])->default(0);
            $table->date('pension_fund_date')->nullable();
            $table->enum('civil_servvant', [0,1])->default(0);
            $table->date('civil_servvant_date')->nullable();
            $table->enum('department_level', [0,1])->default(0);
            $table->date('department_level_date')->nullable();
            $table->enum('minitry_level', [0,1])->default(0);
            $table->date('minitry_level_date')->nullable();
            $table->enum('province_level', [0,1])->default(0);
            $table->date('province_level_date')->nullable();
            $table->enum('management_level', [0,1])->default(0);
            $table->date('management_level_date')->nullable();
            $table->enum('ordination_pasted', [0,1])->default(0);
            $table->enum('draft_pasted', [0,1])->default(0);
            $table->string('ordination_details')->nullable();
            $table->enum('hipp5', [0,1])->default(0);
            $table->enum('new_wave', [0,1])->default(0);
            $table->enum('scoraship', [0,1])->default(0);
            $table->enum('npr', [0,1])->default(0);
            $table->enum('hr_worker', [0,1])->default(0);
            $table->enum('leave_verify_worker', [0,1])->default(0);
            $table->enum('renew_officails', [0,1])->default(0);
            $table->unsignedTinyInteger('renew_times')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->enum('test_work', [0,1])->default(0);
            $table->string('test_work_response')->nullable();
            $table->string('note')->nullable();
            $table->string('edited_by')->nullable();
            $table->date('edited_date')->nullable();
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
        Schema::dropIfExists('personals');
    }
}
