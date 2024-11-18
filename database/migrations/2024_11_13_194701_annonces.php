<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agent_immobiliers', function (Blueprint $table) {
            $table->id();
            $table->string("prenom");
            $table->string("nom");
            $table->timestamps();
        });

        Schema::create("annonces", function (Blueprint $table) {
            $table->id();
            $table->string("ref_annonce")->unique();
            $table->float("prix_annonce");
            $table->float("surface_habitable");
            $table->integer("nombre_de_piece");
            $table->timestamps();

            // Foreign key to link a real estate ad to a real estate agent
            $table->unsignedBigInteger("agent_immobilier_id");

            // Definition of the foreign key used to refer to a real estate agent
            $table->foreign("agent_immobilier_id")->references("id")->on("agent_immobiliers")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_immobiliers');
    }
};
