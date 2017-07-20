<?php

namespace Flagrow\Toolbelt\Repositories;

use Flarum\Extension\Extension;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Support\Str;

class SettingsRepository implements SettingsRepositoryInterface
{
    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * SettingsRepository constructor.
     * @param Extension $extension
     */
    public function __construct(Extension $extension)
    {
        $this->prefix = $extension->getId() . '.';
        $this->settings = app(SettingsRepositoryInterface::class);
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->settings->get(
            $this->prefix($key),
            $default
        );
    }

    /**
     * @param $key
     * @return string
     */
    protected function prefix($key)
    {
        return sprintf(
            "%s%s",
            $this->prefix,
            $key
        );
    }

    /**
     * @return array
     */
    public function all()
    {
        return collect($this->settings->all())
            ->filter(function ($_, $key) {
                return Str::startsWith($key, $this->prefix);
            })
            ->all();
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->settings->set($this->prefix($key), $value);
    }

    /**
     * @param $keyLike
     */
    public function delete($keyLike)
    {
        $this->settings->set($this->prefix($keyLike));
    }
}
