<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\controllers;

use stuarthaas\bitly\Plugin;

use Craft;
use craft\web\Controller;
use craft\web\Response;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class BitlyController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = [];

    // Public Methods
    // =========================================================================

    /**
     * @return Response
     */
    public function actionShorten(): Response
    {
        $longUrl = Craft::$app->request->getRequiredQueryParam('long_url');

        $response =  Plugin::getInstance()->bitly->shorten($longUrl);

        return $this->asJson($response);
    }
}
