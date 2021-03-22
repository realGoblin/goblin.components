<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var CBitrixComponent $component */
echo 'DETAIL';

$APPLICATION->IncludeComponent(
    "goblin.components:news.detail",
    "",
    array(
    ),
    $component
);
?>