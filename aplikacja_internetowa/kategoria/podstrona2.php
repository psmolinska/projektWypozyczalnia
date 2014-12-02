<?php
@include '../start.php';
@include '../config.php';
@setPoziom(1);
@seo();
@headlinki();
?>
<head>
</head><body>
<?php @include '../top_up.php'; ?>
<?php @include '../menu-top.php'; @setPoziom_menutop(1); @buttontop1(); @buttontop2(); @buttontop3(); @buttontop4(); @buttontop5(); ?>
<?php @include '../top_down.php'; ?>
<?php @include '../home_up.php'; ?>
<h2>OFERTA</h2>
<div class="menu-left">
<ul class="menu-left"><?php @include '../menu-left.php'; @setPoziom_menuleft(1); @buttonleft1(); @buttonleft2(); @buttonleft3();  ?></ul>
</div>
<div class="tresc-right">
<h3>Cennik</h3>
<div class="tekst">
Każde auto ma przypisaną cenę wypożyczenia.
Ceny zaczynają się już <b>od 120 zł </b>za całą dobę wypożyczenia !
</div>
<div class="clear"></div>

<?php @include '../stop.php'; ?>
