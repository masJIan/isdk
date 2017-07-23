<?php

namespace mkharla\isdk\Endpoints;

use mkharla\isdk\Http\IClient;

/**
 * Class Auth
 * @package mkharla\isdk\Endpoints
 */
class Auth
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
     * Auth constructor.
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
     * Generate Sign In link
     *
     * @param string $response_type
     * @return string
     */
    public function loginLink(string $response_type = 'token'): string
    {
        $url    = $this->config['auth_url'] . '?client_id=' . $this->config['client']['id'];
        $url    .= '&redirect_uri=' . $this->config['redirect_url'];

        if (!empty($this->config['permissions'])) {
            $url .= '&scope=' . implode('+', $this->config['permissions']);
        }

        $url    .= '&response_type=' . $response_type;

        return (string) $url;
    }

    /**
     * Get access token by code
     *
     * @param string $code
     * @return array
     */
    public function getAccessToken(string $code): array
    {
        return strlen($code) > 0 ? $this->client->postMethod(
            $this->config['access_token_url'],
            [
                'client_id'     =>  $this->config['client']['id'],
                'client_secret' =>  $this->config['client']['secret'],
                'grant_type'    =>  'authorization_code',
                'redirect_uri'  =>  $this->config['redirect_url'],
                'code'          =>  $code
            ]
        ) : [];
    }
}
