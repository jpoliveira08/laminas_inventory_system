<?php

namespace AlbumTest\Controller;

use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class AlbumControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = false;

    protected function setUp(): void
    {
        $configOverrides = [];

        $this->setapplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    /**
     * This test case dispatches the /album URL
     * asserts that the response code is 200
     * and ended up in the desired module and controller.
     *
     * @return void
     * @throws \Exception
     */
    public function testIndexActionCanBeAccessed(): void
    {
        $this->dispatch('/album');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Album');
        $this->assertControllerName(AlbumController::class);
        $this->assertControllerClass('AlbumController');
        $this->assertMatchedRouteName('album');
    }
}
