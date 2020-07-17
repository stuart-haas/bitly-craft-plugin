<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\models;

use stuarthaas\bitly\Bitly;

use Craft;
use craft\base\Model;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    public $pluginName = 'Bitly';
    public $accessToken;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accessToken'], 'string'],
        ];
    }
}
