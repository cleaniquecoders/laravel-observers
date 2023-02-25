<?php

namespace CleaniqueCoders\LaravelObservers\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        // $this->loadLaravelMigrations(['--database' => 'testbench']);

        // $this->artisan('migrate', ['--database' => 'testbench']);
    }

    /**
     * Assert that given FQCN is exist.
     *
     * @param  string  $class_name Fully Qualified Class Name
     */
    public function assertClassExist($class_name)
    {
        $this->assertTrue(class_exists($class_name));
    }

    /**
     * Assert that given helper name exist.
     *
     * @param  string  $helper
     */
    public function assertHelperExist($helper)
    {
        $this->assertTrue(function_exists($helper));
    }

    /**
     * Load Package Service Provider.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array List of Service Provider
     */
    protected function getPackageProviders($app)
    {
        return [
            \CleaniqueCoders\LaravelObservers\LaravelObserversServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Assert the current database has table.
     *
     * @param  string  $table table name
     */
    protected function assertHasTable($table)
    {
        $this->assertTrue(Schema::hasTable($table));
    }

    /**
     * Assert the table has columns defined.
     *
     * @param  string  $table   table name
     * @param  array  $columns list of columns
     */
    protected function assertTableHasColumns($table, $columns)
    {
        collect($columns)->each(function ($column) use ($table) {
            $this->assertTrue(Schema::hasColumn($table, $column));
        });
    }
}
