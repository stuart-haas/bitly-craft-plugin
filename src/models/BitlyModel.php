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
use craft\helpers\Json;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class BitlyModel extends Model
{
    // Public Properties
    // =========================================================================

    public $bitlinkId;
    public $bitlink;
    public $longUrl;

    // Public Methods
    // =========================================================================

    public function __construct($vars)
    {
        $this->bitlinkId = $vars['bitlinkId'];
        $this->bitlink  = $vars['bitlink'];
        $this->longUrl = $vars['longUrl'];
    }

    /**
     * Return model data as json string
     *
     * @return array
     */
    public function json(): string 
    {
        return Json::encode(array(
            'bitlinkId' => $this->bitlinkId,
            'bitlink' => $this->bitlink,
            'longUrl' => $this->longUrl
        ));
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules[] = [['bitlink'], 'required'];
        $rules[] = [['bitlinkId', 'bitlink', 'longUrl'], 'string'];

        return $rules;
    }

}
