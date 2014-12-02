<?php
@include 'start.php';
@include 'config.php';
@setPoziom(0);
@seo();
@headlinki();
session_Start()
?>
</head><body>
<?php @include 'top_up.php'; ?>
<?php @include 'menu-top.php'; @setPoziom_menutop(0); @buttontop1(); @buttontop2(); @buttontop3(); @buttontop4();@buttontop5(); ?>
<?php @include 'top_down.php'; ?>
<?php @include 'home_up.php'; ?>

 
<h2>Witamy na stronie wypożyczalni samochodów "CCwD!"</h2>
<table class="tekst">
<tr>
<td style="vertical-align:middle;width:410px">
<div style="padding:1px;border:1px solid #333333"><img src="images/evo.jpg"></img></div>
</td>
<td colspan="2">
<div class="tresc">
<h3>CCwD!</h3>
<div class="tekst">
Witamy na stronie zaprojektowanej na potrzeby przedmiotu Projektowanie Systemów Mobilnych i Internetowych. Zapraszamy do oglądania :-)
<div class="clear"></div>
</div>
</div>
</td>
</tr>



<?php @include 'stop.php'; ?>