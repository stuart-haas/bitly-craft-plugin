<?php

namespace stuarthaas\bitly\base;

use stuarthaas\bitly\Plugin;

trait PluginTrait {

    public function bitly()
    {
        return Plugin::getInstance()->bitly;
    }
}