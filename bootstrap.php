<?php

namespace Flagrow\Toolbelt;

use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listeners\AddLocale::class);
};
