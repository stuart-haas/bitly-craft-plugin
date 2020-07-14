<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\services;

use stuarthaas\bitly\Plugin;

use Craft;
use craft\base\Component;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class Bitly extends Component
{
    // Constants
    // ========================================================================
    const API_URL = "https://api-ssl.bitly.com/v4/";

    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function shorten($longUrl)
    {
        return $this->request('shorten', ['long_url' => $longUrl], 'POST');
    }

    // Private Methods
    // =========================================================================

    /**
     * Make a request to the Bitly API
     * 
     * @param string $action
     * @param array $json
     * @param string $method
     * 
     * @return Object
     */
    private function request(string $action, array $json = [], string $method = 'GET'): Object
    {   
        $accessToken = Plugin::getInstance()->getSettings()->accessToken;

        $client = Craft::createGuzzleClient(['base_uri' => self::API_URL]);
        $response = $client->request($method, $action, [
            'headers' => [
                'Authorization' => "Bearer {$accessToken}",       
                'Accept' => 'application/json'
            ],
            'json' => $json
        ]);
        
        return json_decode($response->getBody());
    }
}
