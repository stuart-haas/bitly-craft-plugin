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
    public function actionUpdate(): Response
    {   
        $id = Craft::$app->request->getRequiredQueryParam('id');
        $longUrl = Craft::$app->request->getRequiredQueryParam('long_url');

        $response =  Plugin::getInstance()->bitly->update($id, $longUrl);

        return $this->asJson($response);
    }

    /**
     * @return Response
     */
    public function actionCreate(): Response
    {
        $longUrl = Craft::$app->request->getRequiredQueryParam('long_url');

        $response =  Plugin::getInstance()->bitly->create($longUrl);

        return $this->asJson($response);
    }

    public function actionLinksIndex()
    {   
        $vars['links'] = Plugin::$plugin->bitly->links();

        return $this->renderTemplate('bitly/links/index', $vars);
    }

    public function actionViewLink()
    {
        $id = Craft::$app->request->getRequiredQueryParam('id');

        $vars = array(
            'id' => $id,
            'clicks' => Plugin::$plugin->bitly->clicks($id)
        );

        return $this->renderTemplate('bitly/links/_view', $vars);
    }
}
