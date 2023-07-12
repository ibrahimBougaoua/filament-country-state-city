<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Tests;

use IbrahimBougaoua\FilamentCountryStateCity\FilamentCountryStateCityServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'IbrahimBougaoua\\FilamentCountryStateCity\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentCountryStateCityServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-country-state-city_table.php.stub';
        $migration->up();
        */
    }
}
