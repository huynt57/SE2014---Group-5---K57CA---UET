<?php
$I = new WebGuy($scenario);
$I->wantTo('View information about a subject');
$I->amOnPage('/share');
$I->click('Đại số');
$I->see('Upload tài liệu về môn này');
?>
