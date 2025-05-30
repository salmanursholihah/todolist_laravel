<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_user_id_to_tasks_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTasksTable extends Migration
{
public function up()
{
Schema::table('tasks', function (Blueprint $table) {
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});
}

public function down()
{
Schema::table('tasks', function (Blueprint $table) {
$table->dropForeign(['user_id']);
$table->dropColumn('user_id');
});
}
}