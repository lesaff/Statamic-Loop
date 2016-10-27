<?php

namespace Statamic\Addons\Loop;

use Statamic\Extend\Tags;

class LoopTags extends Tags
{

    /**
     * Loops over the tag pair content n times
     * @return string
     */
    public function index()
    {
        // Parameters
        $from    = $this->getInt('from', 1);
        $to      = $this->getInt('to', null);
        $times   = $this->getInt('times', null);
        $vars    = [];

        // Loop by times
        if ($times) {
            for ($i = 0; $i < $times; $i++) {
                $vars[] = array(
                    'value' => $i
                );
            }
        }

        // Loop by from - to ascending
        if ($to && $from < $to) {
            for ($i = $from; $i <= $to; $i++) {
                $vars[] = array(
                    'value' => $i
                );
            }
        }

        // Loop by from - to descending
        if ($to && $from > $to) {
            for ($i = $from; $i >= $to; $i--) {
                $vars[] = array(
                    'value' => $i
                );
            }
        }

        // Parse it
        return $this->parseLoop($vars);
    }

}
