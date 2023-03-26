<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLeads extends Migration
{
    /**
     * The name of the database connection to use.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            Schema::connection($this->connection)->
            table('Leads', function (Blueprint $collection) {
                $collection->index('id');
                $collection->string('full_name');
                $collection->string('email_address');
                $collection->string('industry');
                $collection->string('active_campain_id');
                $collection->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
            ->table('Leads', function (Blueprint $collection)
            {
                $collection->drop();
            });
    }
}
