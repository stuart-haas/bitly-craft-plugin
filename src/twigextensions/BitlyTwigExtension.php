<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitly\twigextensions;

use stuarthaas\bitly\Plugin;

use Craft;
use Twig_Filter;
use Twig_Function;

/**
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class BitlyTwigExtension extends \Twig_Extension  {

    // Public Properties
    // =========================================================================

    /**
     * Returns the name of the extension
     * 
     * @return string The extension name
     */
    public function getName(): string 
    {
        return 'Bitly';
    }

    /**
	 * Returns an array of Twig functions, used in Twig templates via:
	 *
	 * {% set fizz = fooFunction('buzz') %}
	 *
	 * @return array
	 */
    public function getFunctions()
    {
        return array(
            new Twig_Function('bitly', array($this, 'bitly')),
        );   
    }

    public function bitly($vars): string
    {
        return $vars;
    }
}
