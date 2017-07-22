<?php

namespace mkharla\isdk\Endpoints;

use mkharla\isdk\Http\IClient;

/**
 * Class Likes
 * @package mkharla\isdk\Providers
 */
class Likes
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
     * Get all likes of current media
     *
     * @param string $id
     * @param string $access_token
     * @return array
     */
    public function getAllLikesOnMedia(string $id = '', string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return $id > 0 ? $this->client->getMethod(
            $this->config['api_url'] . "/media/$id/likes",
            [
                'access_token'  => $access_token
            ]
        ) : [];
    }

    /**
     * Set likes to media
     *
     * @param string $id
     * @param string $access_token
     * @return array
     */
    public function setOnMedia(string $id = '', string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return strlen($id) > 0 ? $this->client->postMethod(
            $this->config['api_url'] . "/media/$id/likes",
            [
                'access_token'  => $access_token
            ]
        ) : [];
    }

    /**
     * @param string $id
     * @param string $access_token
     * @return array
     */
    public function deleteFromMedia(string $id = '', string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return strlen($id) > 0 ? $this->client->deleteMethod(
            $this->config['api_url'] . "/media/$id/likes",
            [
                'access_token'  => $access_token
            ]
        ) : [];
    }
}
