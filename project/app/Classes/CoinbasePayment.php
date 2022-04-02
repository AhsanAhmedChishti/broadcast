<?php

namespace App\Classes;

/**
 * CoinbasePayment
 *
 * @requires PHP >= 7
 * @author NIXX <hello@nixx.dev>
 * @version 1.0.0
 */
class CoinbasePayment
{
    const API_KEY      = 'apiKey';
    const API_BASE_URL = 'apiBaseUrl';
    const API_VERSION  = 'apiVersion';

    const USER_AGENT = 'weipay-webhooks';

    private $params = [
        self::API_KEY => '',
        self::API_BASE_URL => 'https://api.commerce.coinbase.com',
        self::API_VERSION => '2018-03-22'
    ];

    /**
     * HTTP client
     *
     * @param string $url
     * @param string $method
     * @param array $data
     * @param array $headers
     * @return mixed
     */
    private function http(string $url, string $method = 'GET', array $data = [], array $headers = [])
    {
        $method = strtoupper(trim($method));

        $ch = curl_init($url);

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array_merge([
                "Content-Type: application/json",
                "Accept: application/json",
                "User-Agent: Coinbase",
                "X-CC-Api-Key: {$this->getApiKey()}",
                "X-CC-Version: {$this->getAPiVersion()}"
            ], $headers)
        ];

        if ('GET' !== $method) {
            $options[CURLOPT_CUSTOMREQUEST] = $method;
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
        }

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);

        return json_decode($response);
    }

    /**
     * Creates a charge
     *
     * @param array $args
     * @return mixed
     */
    public function charge(array $args)
    {
        return $this->http("{$this->getApiBaseUrl()}/charges", 'POST', $args);
    }

    /**
     * Sets new API key
     *
     * @param string $key
     * @return void
     */
    public function setApiKey(string $key)
    {
        if (empty($key)) {
            throw new \Exception('API key is required.');
        }

        $this->params[self::API_KEY] = $key;
    }

    /**
     * Gets the API base URL
     *
     * @return string
     */
    public function getApiBaseUrl()
    {
        return $this->params[self::API_BASE_URL];
    }

    /**
     * Gets the API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->params[self::API_KEY];
    }

    /**
     * Gets the API version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->params[self::API_VERSION];
    }

    /**
     * Gets the params
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Verifies Coinbase webhook signature
     *
     * @param string $signature
     * @param mixed $rawBody
     * @param string $sharedSecret
     * @return boolean
     */
    public static function verifySignature(string $signature, $rawBody, string $sharedSecret)
    {
        $hash = hash_hmac('sha256', $rawBody, $sharedSecret);

        return hash_equals($signature, $hash);
    }

    /**
     * Verifies Coinbase webhook user-agent
     *
     * @param string $agent
     * @return boolean
     */
    public  static function verifyUSerAgent(string $agent)
    {
        return $agent === self::USER_AGENT;
    }
}