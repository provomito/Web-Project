use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade'); // Employer (Job poster)
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->enum('job_type', ['Full-time', 'Part-time', 'Remote', 'Contract']);
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('category');
            $table->timestamp('deadline')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
