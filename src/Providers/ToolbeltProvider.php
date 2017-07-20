<?php

namespace Flagrow\Toolbelt\Providers;

use Flarum\Foundation\AbstractServiceProvider;

class ToolbeltProvider extends AbstractServiceProvider
{
    public function register()
    {
        $bootstrapper = include __DIR__ .'/../../bootstrap.php';

        $this->app->call($bootstrapper);
    }
}
