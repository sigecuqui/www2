<?php
$days = 365;
$pack_price = 3.5;
$count_ttl = 0;
$cigs_workdays = 0;
$time_per_cige = 5;
for ($i = 0; $i <= $days; $i++) {
    $day = date('N', strtotime("+ $i day"));
    if ($day <= 5) {
        $cigs_mon_fri = rand(3, 4);
        $count_ttl += $cigs_mon_fri;
        $cigs_workdays += $cigs_mon_fri;
    } elseif ($day == 6) {
        $cigs_sat = rand(10, 20);
        $count_ttl += $cigs_sat;
    } else {
        $cigs_sun = rand(1, 3);
        $count_ttl += $cigs_sun;
    }
}
$packages = ceil($count_ttl / 20);
$price_ttl = ceil($count_ttl / 20) * $pack_price;
$total_mon_fri = ceil($cigs_workdays / 20) * $pack_price;
$time_total = ceil($time_per_cige * $count_ttl / 60);

$h2 = "Per $days dienas surūkysiu $count_ttl cigarečių už $price_ttl eur.";
$h3 = "Nerūkydamas darbo dienomis sutaupyčiau $total_mon_fri eur";
$wasted_time = "Viso traukdamas prastovėsiu $time_total valandų"
?>
<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rūkas</title>
</head>
<style>
    .pack {
        border: 1px solid black;
        margin: 20px;
        display: grid;
        grid-template-columns: repeat(10, 1fr);
    }

    .cige {
        background-image: url("https://www.freeiconspng.com/thumbs/cigarettes-png/cigarettes-png-0.png");
        background-size: cover;
        width: 100px;
        height: 100px;
    }
</style>
<body>
<h1>Mano dūmų skaičiuoklė</h1>
<h2><?php print $h2; ?></h2>
<h3><?php print $h3; ?></h3>
<h3><?php print $wasted_time; ?></h3>
<?php for ($i = 0; $i < $packages; $i++): ?>
    <div class="pack">
        <?php for ($y = 0; ($y < 20 && $count_ttl); $y++, $count_ttl--): ?>
            <div class="cige"></div>
        <?php endfor; ?>
    </div>
<?php endfor; ?>
</body>
</html>