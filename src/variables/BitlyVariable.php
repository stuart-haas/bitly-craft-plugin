<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\variables;

use stuarthaas\bitly\Plugin;

use Craft;
use craft\helpers\Json;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class BitlyVariable
{
    // Public Methods
    // =========================================================================

    /**
     * @return string
     */
    public function getPluginName()
    {
        return Plugin::$plugin->getPluginName();
    }

    /**
     * @return object
     */
    public function groups(): object
    {
        return Plugin::$plugin->bitly->groups();
    }

    /**
     * @return array
     */
    public function links(): array
    {
        return Plugin::$plugin->bitly->links();
    }

    /**
     * @return object
     */
    public function clicks($id): object
    {
        return Plugin::$plugin->bitly->clicks($id);
    }

    /**
     * @return object
     */
    public function clicksSummary($id): object
    {
        return Plugin::$plugin->bitly->clicksSummary($id);
    }
}
