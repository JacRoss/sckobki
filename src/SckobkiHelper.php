<?php

namespace Jackross;

/**
 * Class SkobkiHelper
 * @package Jackross
 */
class SckobkiHelper
{
    /**
     * @param string $text
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public static function validate(string $text): bool
    {
        if (mb_stripos($text, '(') === false && mb_stripos($text, ')') === false) {
            throw new \InvalidArgumentException();
        }

        $count = 0;
        $len = mb_strlen($text);

        for ($i = 0; $i < $len; $i++) {
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



