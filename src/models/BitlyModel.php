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
class BitlyModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var array
     */
    public $bitlinkId = '';
    
    /**
     * @var string
     */
    public $bitlink = '';

    /**
     * @var string
     */
    public $longUrl = '';

    // Public Methods
    // =========================================================================

    public function __construct($vars)
    {
        $this->bitlinkId = $vars['bitlinkId'];
        $this->bitlink = $vars['bitlink'];
        $this->longUrl = $vars['longUrl'];
    }

    public function json() {
        return json_encode([
            'bitlinkId' => $this->bitlinkId,
            'bitlink' => $this->bitlink,
            'longUrl' => $this->longUrl
        ]);
    }
}
