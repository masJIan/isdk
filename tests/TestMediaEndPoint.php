<?php

use mkharla\isdk\InstagramSDK;
use mkharla\isdk\Endpoints\Media;

/**
 * Class TestMediaEndPoint
 */
class TestMediaEndPoint extends PHPUnit_Framework_TestCase
{
    /**
     * @var Media
     */
    public $media;

    /**
     * Setting up instance
     */
    public function setUp(): void
    {
        $sdk = new InstagramSDK();
        $this->media = $sdk->media();
    }

    /**
     * Unset instance after done
     */
    public function tearDown(): void
    {
        unset($this->media);
    }

    /**
     * Check instance.
     */
    public function testInstance(): void
    {
        $this->assertInstanceOf(Media::class, $this->media);
    }

    /**
     * Testing findById() method.
     */
    public function testFindByIdMethod(): void
    {
        $media = $this->media->findById('1564445074136647591_5765505425');

        $this->assertInternalType('array', $media);
        $this->assertEquals(200, $media['meta']['code']);

        /*
         * Test not valid data
         */
        $eMedia = $this->media->findById('1');

        $this->assertInternalType('array', $eMedia);
        $this->assertEquals(400, $eMedia['meta']['code']);
    }

    /**
     * Testing findByCode() method.
     */
    public function testFindByCodeMethod(): void
    {
        $media = $this->media->findByCode('BW2BoGShken');

        $this->assertInternalType('array', $media);
        $this->assertEquals(200, $media['meta']['code']);

        /*
         * Test not valid data
         */
        $eMedia = $this->media->findByCode('1');

        $this->assertInternalType('array', $eMedia);
        $this->assertEquals(400, $eMedia['meta']['code']);
    }

    /**
     * Testing search() method.
     */
    public function testSearchMethod(): void
    {
        $media = $this->media->search(48.858844, 2.294351);

        $this->assertInternalType('array', $media);
        $this->assertEquals(200, $media['meta']['code']);

        /*
         * Test not valid data
         */
        $eMedia = $this->media->search(1, 1, 1, 'not-valid-access-token');

        $this->assertInternalType('array', $eMedia);
        $this->assertEquals(400, $eMedia['meta']['code']);
    }
}
