<?php
@include '../start.php';
@include '../config.php';
@setPoziom(1);
@seo();
@headlinki();
session_start();
?>
</head><body>
<?php @include '../top_up.php'; ?>
<?php @include '../menu-top.php'; @setPoziom_menutop(1);  @buttontop1(); @buttontop2(); @buttontop3(); @buttontop4(); @buttontop5(); ?>
<?php @include '../top_down.php'; ?>
<?php @include '../home_up.php'; ?>
<h2>Przegladanie</h2>


<div class="menu-left">
<ul class="menu-left"><?php @include '../menu-left2.php'; @setPoziom_menuleft2(1); if($_SESSION['ranga']==2) { @buttonleft12(); @buttonleft22(); @buttonleft32(); @buttonleft52(); @buttonleft62(); @buttonleft72();} else if ($_SESSION['ranga']==1) {@buttonleft12(); @buttonleft22(); @buttonleft32();} else {@buttonleft12();} ;?></ul>
</div>
<div class="tresc-right">
<h3>Przeglądaj</h3>
<div class="tekst">
Po lewej stronie znajduje się panel przedstawiający Twoje opcje przeglądania.
Jeżeli widzisz tylko button "Panel Sterowania" Zapraszamy do <a href="localhost/apeczkafinal/">logowania lub rejestracji.</a>

</div>




</div>
<div class="clear"></div>

<?php @include '../stop.php'; ?>