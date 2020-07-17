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

    /** 
     * @param string $id
     * @param string $long_url
     * 
     * @return object
     */
    public function update(string $id, string $longUrl)
    {   
        return $this->request("bitlinks/{$id}", ['long_url' => $longUrl], 'PATCH');
    }

    /**
     * @param string $longUrl
     * 
     * @return object
     */
    public function create(string $longUrl): Object
    {
        return $this->request('bitlinks', ['long_url' => $longUrl], 'POST');
    }

    /**
     * @return object
     */
    public function groups(): object
    {
        return $this->request('groups', null);
    }

    /**
     * @return array
     */
    public function links(): array
    {
        $bitlinks = array();
        $guids = array();
        $groups = $this->groups();
        foreach($groups->groups as $group) 
        {
            $guid = $group->guid;

            $bitlinks[] = array('group_id' => $guid, 'data' => $this->request("groups/{$guid}/bitlinks"));
        }
        return $bitlinks;
    }

    /**
     * @return object
     */
    public function clicks($id): object
    {
        return $this->request("bitlinks/{$id}/clicks");
    }

    /**
     * @return object
     */
    public function clicksSummary($id): object
    {
        return $this->request("bitlinks/{$id}/clicks/summary");
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
     * @return object
     */
    private function request(string $action, $json = null, string $method = 'GET'): Object
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
