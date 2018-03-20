<?php

use Baboon\Exceptions\IllegalRequestTypeException;

class AppTest extends PHPUnit\Framework\TestCase
{
    /* Helper functions */
    public function allowedRequestTypes()
    {
        return [
            'get',
            'post',
            'put',
            'delete'
        ];
    }

    public function getClosure()
    {
        return function() {

        };
    }

    public function testAcceptableRequestTypes()
    {
        $app = new Baboon\App();

        $data = array_diff($app->getAllowedRequestTypes(), $this->allowedRequestTypes());

        $this->assertTrue(empty($data));
    }

    public function testMagicCallMethodShouldReturnException()
    {
        $this->expectException(IllegalRequestTypeException::class);

        $app = new Baboon\App();

        $app->yolo('', '', '');
    }
}
