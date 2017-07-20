<?php

namespace Flagrow\Toolbelt\Listeners;

use DirectoryIterator;
use Flarum\Event\ConfigureLocales;
use Illuminate\Contracts\Events\Dispatcher;

class AddLocale
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureLocales::class, [$this, 'add']);
    }

    /**
     * @param ConfigureLocales $event
     */
    public function add(ConfigureLocales $event)
    {
        foreach (new DirectoryIterator(__DIR__ . '/../../resources/locale') as $file) {
            if ($file->isFile() && in_array($file->getExtension(), ['yml', 'yaml'])) {
                $event->locales->addTranslations($file->getBasename('.' . $file->getExtension()), $file->getPathname());
            }
        }
    }
}
