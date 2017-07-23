<?php

namespace mkharla\isdk;

use mkharla\isdk\Http\CClient;
use mkharla\isdk\Http\VClient;
use mkharla\isdk\Endpoints\Auth;
use mkharla\isdk\Endpoints\Likes;
use mkharla\isdk\Endpoints\Media;
use mkharla\isdk\Endpoints\User;

/**
 * Class InstagramSDK Factory
 * @package mkharla\isdk
 */
class InstagramSDK
{
    /**
     * @var array
     */
    public $config;

    /**
     * @var CClient|VClient
     */
    protected $client;

    /**
     * InstagramSDK constructor.
     */
    public function __construct()
    {
        $this->config = include(__DIR__ . '/../config/instagram.php');

        switch ($this->config['http_client']) {
            case 'vendor':
                $this->client = new VClient();
                break;
            default:
                $this->client = new CClient();
                break;
        }
    }

    /**
     * @return Auth
     */
    public function auth(): Auth
    {
        return new Auth($this->config, $this->client);
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return new User($this->config, $this->client);
    }

    /**
     * @return Media
     */
    public function media(): Media
    {
        return new Media($this->config, $this->client);
    }

    /**
     * @return Likes
     */
    public function likes(): Likes
    {
        return new Likes($this->config, $this->client);
    }
}
