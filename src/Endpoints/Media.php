<?php

namespace mkharla\isdk\Endpoints;

use mkharla\isdk\Http\IClient;

/**
 * Class Media
 * @package mkharla\isdk\Providers
 */
class Media
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
     * Find media by id
     *
     * @param string $id
     * @param string $access_token
     * @return array
     */
    public function findById(string $id = '', string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return strlen($id) > 0 ? $this->client->getMethod(
            $this->config['api_url'] . '/media/' . $id,
            [
                'access_token'  =>  $access_token
            ]
        ) : [];
    }

    /**
     * Find media by short code
     *
     * @param string $code
     * @param string $access_token
     * @return array
     */
    public function findByCode(string $code = '', string $access_token = ''): array
    {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return strlen($code) > 0 ? $this->client->getMethod(
            $this->config['api_url'] . '/media/shortcode/' . $code,
            [
                'access_token'  =>  $access_token
            ]
        ) : [];
    }

    /**
     * Search media by coordinates
     *
     * @param float $lat
     * @param float $lng
     * @param int $distance
     * @param string $access_token
     * @return array
     */
    public function search(
        float $lat,
        float $lng,
        int $distance = 1,
        string $access_token = ''
    ): array {
        $access_token = strlen($access_token) > 0 ? $access_token : $this->config['access_token'];

        return ($lat > 0 && $lng > 0 ) ? $this->client->getMethod(
            $this->config['api_url'] . '/media/search',
            [
                'access_token'  =>  $access_token,
                'lat'           =>  $lat,
                'lng'           =>  $lng,
                'distance'      =>  $distance
            ]
        ) : [];
    }
}
