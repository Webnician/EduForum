<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure CodeCeption Works');
$I->amOnPage('/');
$I->see('Eduforum');
