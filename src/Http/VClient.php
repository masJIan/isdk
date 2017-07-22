<?php

namespace mkharla\isdk\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class VClient
 * @package mkharla\isdk\Http
 */
class VClient implements IClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * VClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * GET method request handler
     *
     * @param string $url
     * @param array $query
     * @return array
     */
    public function getMethod(string $url, array $query): array
    {
        try {
            $request = $this->client
                ->get($url, ['query' => $query])
                ->getBody()
                ->getContents();
        } catch (ClientException $exception) {
            $request = $exception->getResponse()->getBody()->getContents();
        }

        return json_decode($request, true);
    }

    /**
     * POST method request handler
     *
     * @param string $url
     * @param array $query
     * @return array
     */
    public function postMethod(string $url, array $query): array
    {
        try {
            $request = $this->client
                ->post($url, ['form_params' => $query])
                ->getBody()
                ->getContents();
        } catch (ClientException $exception) {
            $request = $exception->getResponse()->getBody()->getContents();
        }

        return json_decode($request, true);
    }

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function deleteMethod(string $url, array $query): array
    {
        try {
            $request = $this->client
                ->delete($url, ['query' => $query])
                ->getBody()
                ->getContents();
        } catch (ClientException $exception) {
            $request = $exception->getResponse()->getBody()->getContents();
        }

        return json_decode($request, true);
    }
}
