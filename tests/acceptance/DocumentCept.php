<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure that frontpage works');
$I->amOnPage('/document'); 
$I->see('Bạn muốn chia sẻ 1 tài liệu lên?');
?>
