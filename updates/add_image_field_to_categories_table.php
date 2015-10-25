<?php

    namespace Martin\BlogCatImages\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class AddImageFieldToCategoriesTable extends Migration {

        public function up() {
            Schema::table('rainlab_blog_categories', function($table) {
                $table->string('image', 150)->after('description')->nullable();
            });
        }

        public function down() {
            Schema::table('rainlab_blog_categories', function($table) {
                $table->dropColumn('image');
            });
        }

    }

?>