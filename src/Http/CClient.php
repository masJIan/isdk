<?php

namespace mkharla\isdk\Http;

/**
 * Class CClient
 * @package mkharla\isdk\Http
 */
class CClient implements IClient
{

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function getMethod(string $url, array $query): array
    {
        $curl = curl_init($url . '?' . http_build_query($query));

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => 1,
        ]);

        $result = curl_exec($curl);

        if(curl_errno($curl))
        {
            $error = curl_error($curl);
            return is_array($error) ? $error : (array) $error;
        }

        curl_close($curl);

        return json_decode($result, true);
    }

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function postMethod(string $url, array $query): array
    {
        $curl = curl_init($url);

        curl_setopt_array($curl, [
            CURLOPT_POST            =>  true,
            CURLOPT_POSTFIELDS      =>  $query,
            CURLOPT_RETURNTRANSFER  =>  1,
            CURLOPT_SSL_VERIFYPEER  =>  false
        ]);

        $result = curl_exec($curl);

        if(curl_errno($curl))
        {
            $error = curl_error($curl);
            return is_array($error) ? $error : (array) $error;
        }

        curl_close($curl);

        return json_decode($result, true);
    }

    /**
     * @param string $url
     * @param array $query
     * @return array
     */
    public function deleteMethod(string $url, array $query): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             =>  $url . '?' . http_build_query($query),
            CURLOPT_CUSTOMREQUEST   =>  "DELETE",
            CURLOPT_RETURNTRANSFER  =>  true,
        ]);

        $result = curl_exec($curl);

        if(curl_errno($curl))
        {
            $error = curl_error($curl);
            return is_array($error) ? $error : (array) $error;
        }

        curl_close($curl);

        return json_decode($result, true);
    }
}
