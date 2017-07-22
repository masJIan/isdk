<?php

namespace mkharla\isdk\Http;

/**
 * Interface IClient
 * @package mkharla\isdk\Http
 */
interface IClient
{
    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function getMethod(string $url, array $query): array;

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function postMethod(string $url, array $query): array;

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function deleteMethod(string $url, array $query): array;
}
