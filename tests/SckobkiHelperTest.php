<?php

namespace Jackross\Tests;

use Jackross\SckobkiHelper;
use PHPUnit\Framework\TestCase;

class SckobkiHelperTest extends TestCase
{

    public function testValidBrackets()
    {
      $this->assertTrue(SckobkiHelper::validate('((pam)())((({PIP})))(()(param))'));
    }

    public function testInvalidBrackets()
    {
        $this->assertTrue(SckobkiHelper::validate('(()()()()))((((()()()))(()()()(((()))))))'));
    }

    public function testInvalidBracketsArgument()
    {
        $this->expectException(\InvalidArgumentException::class);
        SckobkiHelper::validate('pam param pam');
    }

}