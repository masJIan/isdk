<?php

use mkharla\isdk\InstagramSDK;
use mkharla\isdk\Endpoints\Likes;

/**
 * Class TestLikesEndPoint
 */
class TestLikesEndPoint extends PHPUnit_Framework_TestCase
{
    /**
     * @var Likes
     */
    public $likes;

    /**
     * Setting up instance
     */
    public function setUp(): void
    {
        $sdk = new InstagramSDK();
        $this->likes = $sdk->likes();
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
        $this->assertInstanceOf(Likes::class, $this->likes);
    }

    /**
     * Testing getAllLikesOnMedia() method.
     */
    public function testGetAllLikesOnMediaMethod(): void
    {
        $current = $this->likes->getAllLikesOnMedia('1564445074136647591_5765505425');

        $this->assertInternalType('array', $current);
        $this->assertEquals(200, $current['meta']['code']);
    }

    /**
     * Testing setOnMedia() method.
     */
    public function testSetOnMediaMethod(): void
    {
        $like = $this->likes->setOnMedia('1564445074136647591_5765505425');

        $this->assertInternalType('array', $like);
        $this->assertEquals(200, $like['meta']['code']);

        /*
         * Test not valid data
         */

        $elike = $this->likes->setOnMedia(1);

        $this->assertInternalType('array', $elike);
        $this->assertEquals(400, $elike['meta']['code']);
    }

    /**
     * Testing deleteFromMedia() method.
     */
    public function testDeleteFromMediaMethod(): void
    {
        $like = $this->likes->deleteFromMedia('1564445074136647591_5765505425');

        $this->assertInternalType('array', $like);
        $this->assertEquals(200, $like['meta']['code']);

        /*
         * Test not valid data
         */

        $elike = $this->likes->deleteFromMedia(1);

        $this->assertInternalType('array', $elike);
        $this->assertEquals(400, $elike['meta']['code']);
    }
}
