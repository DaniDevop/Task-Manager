<?php

use App\Models\categorie;
use App\Models\User;
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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('taches_name');
            $table->string('date_echeances');
            $table->string('date_fin')->nullable();
            $table->string('confirmation')->nullable();
            $table->string('statut');
            $table->string('Bonus')->nullable();
            $table->string('user_action');
            $table->foreignIdFor(categorie::class);
            $table->foreignIdFor(User::class)->nullable();
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
        Schema::dropIfExists('taches');
    }
};
