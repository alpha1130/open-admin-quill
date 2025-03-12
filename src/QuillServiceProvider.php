<?php

namespace Alpha1130\OpenAdminQuill;

use Illuminate\Support\ServiceProvider;
use OpenAdmin\Admin\Form;

class QuillServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(QuillExtension $extension)
    {
        if (! QuillExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'open-admin-quill');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [
                    $assets => \public_path('vendor/alpha1130/open-admin-quill'),
                    __DIR__ . '/../config/quill.php' => \config_path('quill.php'),
                ],
                'open-admin-quill'
            );
        }

        $this->app->booted(function () {
            Form::extend('quill', Quill::class);
        });
    }
}