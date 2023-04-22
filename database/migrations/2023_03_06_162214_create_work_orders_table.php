<?php

use App\Models\Account;
use App\Models\CustomerOrder;
use App\Models\ManufacturerProductVariation;
use App\Models\Media;
use App\Models\RequestedShippingMethod;
use App\Models\MediaWorkOrder;
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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(CustomerOrder::class);
            $table->foreignIdFor(ManufacturerProductVariation::class);
            $table->foreignIdFor(RequestedShippingMethod::class);
            $table->foreignIdFor(Account::class);
            $table->string('from_first_name');
            $table->string('from_last_name');
            $table->string('from_address_1');
            $table->string('from_address_2');
            $table->string('from_city');
            $table->string('from_zip');
            $table->string('from_state');
            $table->string('to_first_name');
            $table->string('to_last_name');
            $table->string('to_address_1');
            $table->string('to_address_2');
            $table->string('to_city');
            $table->string('to_zip');
            $table->string('to_state');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
};
