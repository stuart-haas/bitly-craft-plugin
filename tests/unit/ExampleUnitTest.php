<?php
/**
 * Bitly plugin for Craft CMS 3.x
 *
 * Generate short urls
 *
 * @link      https://github.com/stuart-haas
 * @copyright Copyright (c) 2020 Stuart Haas
 */

namespace stuarthaas\bitlytests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use stuarthaas\bitly\Bitly;

/**
 * ExampleUnitTest
 *
 *
 * @author    Stuart Haas
 * @package   Bitly
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            Bitly::class,
            Bitly::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
