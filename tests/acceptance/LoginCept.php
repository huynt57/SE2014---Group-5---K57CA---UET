<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', 'davert');
$I->fillField('Password','qwerty');
$I->click('Submit');
$I->see('Ten nguoi dung chua dc dang ky');
?>
