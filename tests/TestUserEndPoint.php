<?php

use mkharla\isdk\InstagramSDK;
use mkharla\isdk\Endpoints\User;

/**
 * Class TestUserEndPoint
 */
class TestUserEndPoint extends PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    public $user;

    /**
     * Setting up instance
     */
    public function setUp(): void
    {
        $sdk = new InstagramSDK();
        $this->user = $sdk->user();
    }

    /**
     * Unset instance after done
     */
    public function tearDown(): void
    {
        unset($this->user);
    }

    /**
     * Check instance.
     */
    public function testInstance(): void
    {
        $this->assertInstanceOf(User::class, $this->user);
    }

    /**
     * Testing current() method.
     */
    public function testCurrentMethod(): void
    {
        $current = $this->user->current();

        $this->assertInternalType('array', $current);
        $this->assertEquals(200, $current['meta']['code']);

        /*
         * Test not valid data
         */

        $eCurrent = $this->user->current('not-valid-access-token');

        $this->assertInternalType('array', $eCurrent);
        $this->assertEquals(400, $eCurrent['meta']['code']);
    }

    /**
     * Testing media() method.
     */
    public function testMediaMethod(): void
    {
        $media = $this->user->media();

        $this->assertInternalType('array', $media);
        $this->assertEquals(200, $media['meta']['code']);

        /*
         * Test not valid data
         */

        $eMedia = $this->user->media('not-valid-access-token');

        $this->assertInternalType('array', $eMedia);
        $this->assertEquals(400, $eMedia['meta']['code']);
    }

    /**
     * Testing findById() method.
     */
    public function testFindByIdMethod(): void
    {
        $findById = $this->user->findById(5765505425);

        $this->assertInternalType('array', $findById);
        $this->assertEquals(200, $findById['meta']['code']);

        /*
         * Test not valid data
         */

        $eFindById = $this->user->findById(1, 'not-valid-access-token');

        $this->assertInternalType('array', $eFindById);
        $this->assertEquals(400, $eFindById['meta']['code']);
    }

    /**
     * Testing findByName() method.
     */
    public function testFindByNameMethod(): void
    {
        $findByName = $this->user->findByName('mykhailo');

        $this->assertInternalType('array', $findByName);
        $this->assertEquals(200, $findByName['meta']['code']);

        /*
         * Test not valid data
         */

        $eFindByName = $this->user->findByName(1, 5, 'not-valid-access-token');

        $this->assertInternalType('array', $eFindByName);
        $this->assertEquals(400, $eFindByName['meta']['code']);
    }
}
