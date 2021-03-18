<?php

use Hyperf\DbConnection\Db;
use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('otp.table-name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_req_id');
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('type');
            $table->string('otp');
            $table->string('uuid');
            $table->string('secret')->nullable();
            
            $table->tinyInteger('retry');
            $table->enum('status',['new','used', 'expired']);

            $table->dateTime('created_at')
                ->default(Db::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')
                ->default(Db::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(['client_req_id', 'uuid', 'status', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('otp.table-name'));
    }
}
