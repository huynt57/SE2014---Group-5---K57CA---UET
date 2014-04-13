<?php
$I = new WebGuy($scenario);
$I->wantTo('post a status');
$I->fillField('post_content', 'nguyen the huy');
$I->see('nguyen the huy');
?>
