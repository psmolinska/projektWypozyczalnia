<?php
@include '../start.php';
@include '../config.php';
@setPoziom(1);
@seo();
@headlinki();
?>
</head><body>
<?php @include '../top_up.php'; ?>
<?php @include '../menu-top.php'; @setPoziom_menutop(1); @buttontop1(); @buttontop2(); @buttontop3(); @buttontop4(); @buttontop5();?>
<?php @include '../top_down.php'; ?>
<?php @include '../home_up.php'; ?>
<h2>Kontakt z obsługą serwisu</h2>
<div class="kontakt-formularz">
pon-pt 08:00-16:00<br />
tel.: 123-4561-789<br />
e-mail: kontakt@ccwd.pl<br />
GG: 99297094<br /><br />

</div>


<div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d632.2193070305784!2d16.06898189999999!3d50.66654000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470ef66cf9268ded%3A0x865b39e9e898645c!2zUnluZWsgNCwgNTgtNDA3IENoZcWCbXNrbyDFmmzEhXNraWU!5e0!3m2!1spl!2spl!4v1417436530529" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>

<div class="clear"></div>

<?php @include '../stop.php'; ?>