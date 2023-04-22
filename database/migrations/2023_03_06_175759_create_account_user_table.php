<?php

use App\Models\Account;
use App\Models\User;
use App\Models\AccountUser;
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
        Schema::create('account_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Account::class);
            $table->enum('role', [AccountUser::ADMIN, AccountUser::MANAGER, AccountUser::EMPLOYEE]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_user');
    }
};
