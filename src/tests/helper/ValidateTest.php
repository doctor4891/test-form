<?php

namespace helper;

use model\User;
use PHPUnit\Framework\TestCase;

class ValidateTest extends TestCase
{
    public function testRegisterWithAlreadyRegisteredUser()
    {
        $result = Validate::registerForm();
        $this->assertFalse($result);
    }

    public function testRegisterIfAllCorrect()
    {
        $_POST['login'] = 'test123';
        $_POST['email'] = 'test123@gmail.com';

        $result = Validate::registerForm();
        $this->assertTrue($result);
    }

    public function testRegisterIfBadLogin()
    {
        $_POST['login'] = '<script>';

        $result = Validate::registerForm();
        $this->assertFalse($result);
    }

    public function testLoginWithAlreadyRegisteredUser()
    {
        $result = Validate::loginForm();
        $this->assertTrue($result);
    }


    protected function setUp(): void
    {
        $_POST['login'] = 'test';
        $_POST['password'] = 'javiru';
        $_POST['email'] = 'freedocs.xyz@gmail.com';
        $_POST['csrf'] = $_COOKIE['csrf'] = CSRF::generate();
        $_FILES['userpic'] = [
            'size' => 50000,
            'type' => 'image/png'
        ];
    }

    protected function tearDown(): void
    {
        unset($_POST);
        unset($_FILES);
        unset($_COOKIE);
    }
}
