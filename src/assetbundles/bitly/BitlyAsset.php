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
            'https://cdn.jsdelivr.net/npm/vue@2.6.11',
            'js/bitly.js',
        ];

        $this->css = [
            'css/bitly.css',
        ];

        parent::init();
    }
}
