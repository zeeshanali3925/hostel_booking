<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            // $table->string('title')->nullable();  <-- ye line comment kar do ya hata do
          //  $table->text('description')->nullable(); // bas ye line rakho
        });
    }
    
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            // $table->dropColumn(['title', 'description']); 
        //    $table->dropColumn('description'); // sirf description drop karo
        });
    }
};
