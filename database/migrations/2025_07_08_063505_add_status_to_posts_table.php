public function up(): void
{
    Schema::table('posts', function (Blueprint $table) {
        $table->timestamp('published_at')->nullable()->after('status');
    });
}

public function down(): void
{
    Schema::table('posts', function (Blueprint $table) {
        $table->dropColumn('published_at');
    });
}
