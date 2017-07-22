<?php

use mkharla\isdk\InstagramSDK;

/**
 * Class TestUserEP
 */
class TestUserEP extends PHPUnit_Framework_TestCase
{
    /**
     * First test
     */
    public function testUserEndPointCurrentMethod()
    {
        $sdk = new InstagramSDK();
        $user = $sdk->user()->current();

        $this->assertInternalType('array', $user);
        $this->assertEquals(200, $user['meta']['code']);
    }
}
