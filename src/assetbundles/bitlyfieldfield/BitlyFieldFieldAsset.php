<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\assetbundles\bitlyfieldfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class BitlyFieldFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@stuarthaas/bitly/assetbundles/bitlyfieldfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/BitlyField.js',
        ];

        $this->css = [
            'css/BitlyField.css',
        ];

        parent::init();
    }
}
