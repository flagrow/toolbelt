<?php

namespace Flagrow\Toolbelt\Listeners;

use Flarum\Event\ConfigureWebApp;
use Illuminate\Contracts\Events\Dispatcher;

class AddJs
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureWebApp::class, [$this, 'add']);
    }

    public function add(ConfigureWebApp $event)
    {
        $event->addAssets(
            __DIR__ . '/../../js/dist/toolbelt.js'
        );

        $event->addBootstrapper('flagrow/toolbelt/main');
    }
}
