<?php

namespace mkharla\isdk\Http;

/**
 * Class CClient
 * @package mkharla\isdk\Http
 */
class CClient implements IClient
{

    /**
     * GET method request handler
     *
     * @param string $url
     * @param array $query
     * @return array
     */
    public function getMethod(string $url, array $query): array
    {
        return $this->makeCall($url . '?' . http_build_query($query), 'get');
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
        return $this->makeCall($url, 'post', $query);
    }

    /**
     * DELETE method request handler
     *
     * @param string $url
     * @param array $query
     * @return array
     */
    public function deleteMethod(string $url, array $query): array
    {
        return $this->makeCall($url . '?' . http_build_query($query), 'delete');
    }

    /**
     * Curl Request builder
     *
     * @param string $url
     * @param string $method
     * @param array $params
     * @return array
     */
    private function makeCall(string $url, string $method = 'get', array $params = []): array
    {
        $curl       = curl_init();
        $options    = [
            CURLOPT_URL             =>  $url,
            CURLOPT_RETURNTRANSFER  =>  true,
        ];

        switch ($method) {
            case 'post':
                $options[CURLOPT_POST]              = true;
                $options[CURLOPT_POSTFIELDS]        = $params;
                $options[CURLOPT_SSL_VERIFYPEER]    = false;
                break;
            case 'delete':
                $options[CURLOPT_CUSTOMREQUEST] = "DELETE";
                break;
        }

        curl_setopt_array($curl, $options);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
            return is_array($error) ? $error : (array) $error;
        }

        curl_close($curl);

        return json_decode($result, true);
    }
}
