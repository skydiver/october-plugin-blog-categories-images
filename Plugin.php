<?php

    namespace Martin\BlogCatImages;

    use System\Classes\PluginBase;
    use RainLab\Blog\Controllers\Categories as BlogCategories;
    use RainLab\Blog\Models\Category as BlogCategory;

    class Plugin extends PluginBase {

        public $require = ['RainLab.Blog'];

        public function pluginDetails() {
            return [
                'name'        => 'martin.blogcatimages::lang.plugin.name',
                'description' => 'martin.blogcatimages::lang.plugin.description',
                'author'      => 'Martin M.',
                'icon'        => 'icon-file-image-o',
                'homepage'    => 'https://octobercms.com/author/Martin'
            ];
        }

        public function boot() {

            \Event::listen('backend.form.extendFields', function($widget) {

                if(!$widget->getController() instanceof \RainLab\Blog\Controllers\Categories) {
                    return;
                }

                if(!$widget->model instanceof \RainLab\Blog\Models\Category) {
                    return;
                }

                $widget->addFields([
                    'image' => [
                        'label' => 'cms::lang.media.select_single_image',
                        'type'  => 'mediafinder',
                        'mode'  => 'image'
                    ]
                ]);

            });

        }

    }

?>