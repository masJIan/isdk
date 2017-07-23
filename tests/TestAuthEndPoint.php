<?php

use mkharla\isdk\InstagramSDK;
use mkharla\isdk\Endpoints\Auth;

class TestAuthEndPoint extends PHPUnit_Framework_TestCase
{
    /**
     * @var Auth
     */
    public $auth;

    /**
     * Setting up instance
     */
    public function setUp(): void
    {
        $sdk = new InstagramSDK();
        $this->auth = $sdk->auth();
    }

    /**
     * Unset instance after done
     */
    public function tearDown(): void
    {
        unset($this->auth);
    }

    /**
     * Check instance
     */
    public function testInstance(): void
    {
        $this->assertInstanceOf(Auth::class, $this->auth);
    }

    /**
     * Testing loginLink() method.
     */
    public function testLoginLinkMethod(): void
    {
        $config         =  include(__DIR__ . '/../config/instagram.php');
        $responseType   = 'code';

        $url = 'https://api.instagram.com/oauth/authorize?client_id=' . $config['client']['id'];
        $url .= '&redirect_uri=' . $config['redirect_url'] . '&scope=' . implode("+", $config['permissions']);
        $url .= '&response_type=' . $responseType;

        $this->assertEquals($url, $this->auth->loginLink($responseType));
    }

    /**
     * Check getAccessToken method
     */
    public function testGetAccessToken(): void
    {
        $code = $this->auth->getAccessToken('c80142a86ba44596aea4c571a668ff28');

        $this->assertInternalType('array', $code);
        $this->assertEquals(200, $code['meta']['code']);

        /*
         * Test not valid data
         */

        $eCode = $this->auth->getAccessToken('1');

        $this->assertInternalType('array', $eCode);
        $this->assertEquals(400, $eCode['code']);
    }
}
