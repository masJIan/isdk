<?php

namespace mkharla\isdk\Endpoints;

use mkharla\isdk\Http\IClient;

/**
 * Class User
 * @package mkharla\isdk\Providers
 */
class User
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var IClient
     */
    private $client;

    /**
     * User constructor.
     *
     * @param array $config
     * @param IClient $client
     */
    public function __construct(array $config, IClient $client)
    {
        $this->config   = $config;
        $this->client   = $client;
    }

    /**
     * Get current user information
     *
     * @param string $access_token
     * @return array
     */
    public function current(string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return $this->client->getMethod(
            $this->config['api_url'] . '/users/self',
            [
                'access_token'  =>  $access_token
            ]
        );
    }

    /**
     * Get Users media data
     *
     * @param string $access_token
     * @return array
     */
    public function media(string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return $this->client->getMethod(
            $this->config['api_url'] . '/users/self/media/recent',
            [
                'access_token'  =>  $access_token
            ]
        );
    }

    /**
     * Find user by Id
     *
     * @param int $id
     * @param string $access_token
     * @return array
     */
    public function findById(int $id = 0, string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return $id > 0 ? $this->client->getMethod(
            $this->config['api_url'] . '/users/' . $id,
            [
                'access_token'  => $access_token
            ]
        ) : [];
    }

    /**
     * Find Users by given name
     *
     * @param string $name
     * @param int $count
     * @return array
     */
    public function findByName(string $name, int $count = 5): array
    {
        return strlen($name) > 0 ? $this->client->getMethod(
            $this->config['api_url'] . '/users/search',
            [
                'q'             =>  $name,
                'count'         =>  $count,
                'access_token'  =>  $this->config['access_token']
            ]
        ) : [];
    }
}
