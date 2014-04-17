<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->click('#Chua');
$I->see('Ten cua ban *');
?>
