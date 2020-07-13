<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\assetbundles\bitly;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class BitlyAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@stuarthaas/bitly/assetbundles/bitly/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Bitly.js',
        ];

        $this->css = [
            'css/Bitly.css',
        ];

        parent::init();
    }
}
