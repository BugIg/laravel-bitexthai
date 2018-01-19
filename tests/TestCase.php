<?php
namespace BugIg\Bitexthai\Test;

use BugIg\Bitexthai\BitexthaiAPIFacade;
use BugIg\Bitexthai\BitexthaiAPIServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return \BugIg\Bitexthai\BitexthaiAPIServiceProvider;
     */
    protected function getPackageProviders($app)
    {
        return [BitexthaiAPIServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'BitexthaiAPI' => BitexthaiAPIFacade::class,
        ];
    }
}