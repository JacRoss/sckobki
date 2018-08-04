<?php

namespace Jackross;

/**
 * Class SkobkiHelper
 * @package Jackross\Helpers
 */
class SckobkiHelper
{
    /**
     * @param string $text
     * @return bool
     */
    public static function validate(string $text): bool
    {
        if (mb_stripos('(', $text) && mb_stripos(')', $text)) {
            throw new \InvalidArgumentException();
        }

        $count = 0;

        for ($i = 0; $i < mb_strlen($text); $i++) {
            $symbol = mb_substr($text, $i, 1);

            if ($symbol === '(') {
                $count++;
            }

            if ($symbol === ')') {
                $count--;
            }

            if ($count < 0) {
                break;
            }
        }

        return $count === 0;
    }
}



