<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $unRol = Role::create(['name' => 'admin']);
        $unUsuario = User::find(1);
        $unUsuario->assignRole($unRol);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
    }
};
