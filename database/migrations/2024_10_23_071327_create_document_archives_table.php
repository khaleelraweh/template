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
        Schema::create('document_archives', function (Blueprint $table) {
            $table->id();
            $table->json('doc_archive_name'); // إسم الوثيقة المخزنة
            $table->json('slug');
            $table->json('doc_archive_attached_file')->nullable();

            // will be use always
            $table->boolean('status')->nullable()->default(false);
            $table->dateTime('published_on')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // end of will be use always
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_archives');
    }
};
