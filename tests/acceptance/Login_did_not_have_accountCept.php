<?php
$I = new WebGuy($scenario);
$I->wantTo('sign up');
$I->amOnPage('/login');
$I->click('Sign_up');
$I->see('Đăng Ký');
?>
