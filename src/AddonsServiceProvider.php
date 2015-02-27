<?php

namespace CodeDungeon\Addons;

use Illuminate\Support\ServiceProvider;

class AddonsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerSeedGenerator();
		$this->registerMigrationGenerator();
		$this->registerPivotMigrationGenerator();
	}

	/**
	 * Register the make:seed generator.
	 */
	private function registerSeedGenerator()
	{
		$this->app->singleton('command.codedungeon.seed', function ($app) {
			return $app['CodeDungeon\Addons\Commands\SeedMakeCommand'];
		});

		$this->commands('command.codedungeon.seed');
	}

	/**
	 * Register the make:migration generator.
	 */
	private function registerMigrationGenerator()
	{
		$this->app->singleton('command.codedungeon.migrate', function ($app) {
			return $app['CodeDungeon\Addons\Commands\MigrationMakeCommand'];
		});

		$this->commands('command.codedungeon.migrate');
	}

	/**
	 * Register the make:pivot generator.
	 */
	private function registerPivotMigrationGenerator()
	{
		$this->app->singleton('command.codedungeon.migrate.pivot', function ($app) {
			return $app['CodeDungeon\Addons\Commands\PivotMigrationMakeCommand'];
		});

		$this->commands('command.codedungeon.migrate.pivot');
	}

}
