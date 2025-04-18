<?php
// MyProject/Classes/AbstractUser.php
namespace MyProject\Classes;

abstract class AbstractUser {
    public $name;
    public $login;

    abstract public function showInfo();
}
