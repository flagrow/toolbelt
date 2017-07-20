# Toolbelt by ![flagrow logo](https://avatars0.githubusercontent.com/u/16413865?v=3&s=15) [flagrow](https://discuss.flarum.org/d/1832-flagrow-extension-developer-group)

[![Support on patreon](https://img.shields.io/badge/support%20on-patreon-orange.svg)](https://patreon.com/flagrow) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/flagrow/toolbelt/license.md) [![Latest Stable Version](https://img.shields.io/packagist/v/flagrow/toolbelt.svg)](https://github.com/flagrow/toolbelt) [![Total Downloads](https://img.shields.io/packagist/dt/flagrow/toolbelt.svg)](https://github.com/flagrow/toolbelt)

__This is not an extension!__

Toolbelt is a package meant for extension developers. It offers re-usable components and helper classes for both the
back- and frontend of Flarum extensions.

### Use

Add to your extension composer.json:

```json
  "require": {
    // ..
    "flagrow/toolbelt": "^0.1.0"
  }
```

Update your own package from the Flarum installation directory to install the new dependency;

```bash
composer update <vendor>/<package>
```

Now in your bootstrap.php:

```php
return function (Flarum\Foundation\Application $app) {
    // Registers toolbelt locale, js and php namespace.
    $app->register(Flagrow\Toolbelt\Providers\ToolbeltProvider::class);
}
```

You might have other arguments in that function, just add the Application in addition.

### links

- [changelog](https://github.com/flagrow/toolbelt/blob/master/changelog.md)
- [on github](https://github.com/flagrow/toolbelt)
- [on packagist](http://packagist.com/packages/flagrow/toolbelt)
- [issues](https://github.com/flagrow/toolbelt/issues)


An extension by [Flagrow](https://flagrow.io), a project of [Gravure](https://gravure.io).
