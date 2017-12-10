<?php include 'dbconnect.php';
include"header.php";
$date = date("d");
$usual_v;
$usual_vc;
$usual_ve;
$usual_vf;
$usual_nv;
$usual_nvc;
$usual_nvf;
$usual_nve;
$query1="SELECT count(id) as count from messjoin where (MENU='VEG' AND active=1)";
$query2="SELECT count(id) as count from messjoin where (MENU='VC'AND active=1)";
$query3="SELECT count(id) as count from messjoin where (MENU='VE' AND active=1)";
$query4="SELECT count(id) as count from messjoin where (MENU='VF'AND active=1)";
$query5="SELECT count(id) as count from messjoin where (MENU='NV' AND active=1)";
$query6="SELECT count(id) as count from messjoin where (MENU='NVC' AND active=1)";
$query7="SELECT count(id) as count from messjoin where (MENU='NVF' AND active=1)";
$query8="SELECT count(id) as count from messjoin where (MENU='NVE' AND active=1)";
$query9="SELECT count(id) as count from messjoin where (MENU='VFF' AND active=1)";
$query10="SELECT count(id) as count from messjoin where (MENU='VFC'AND active=1)";
$query11="SELECT count(id) as count from messjoin where (MENU='NVFF' AND active=1)";
$query12="SELECT count(id) as count from messjoin where (MENU='NVFC' AND active=1)";
if($date<="15")
{
	$query13 = "SELECT count(id) as count from milkfirsthalf";
}
else {
	$query13 = "SELECT count(id) as count from milksecondhalf";
}


$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$usual_v=$row['count'];
}

$result=mysqli_query($link,$query2);
while($row=mysqli_fetch_assoc($result))
{
	$usual_vc=$row['count'];
}

$result=mysqli_query($link,$query3);
while($row=mysqli_fetch_assoc($result))
{
	$usual_ve=$row['count'];
}

$result=mysqli_query($link,$query4);
while($row=mysqli_fetch_assoc($result))
{
	$usual_vf=$row['count'];
}

$result=mysqli_query($link,$query5);
while($row=mysqli_fetch_assoc($result))
{
	$usual_nv=$row['count'];
}

$result=mysqli_query($link,$query6);
while($row=mysqli_fetch_assoc($result))
{
	$usual_nvc=$row['count'];
}

$result=mysqli_query($link,$query7);
while($row=mysqli_fetch_assoc($result))
{
	$usual_nvf=$row['count'];
}

$result=mysqli_query($link,$query8);
while($row=mysqli_fetch_assoc($result))
{
	$usual_nve=$row['count'];
}
$result=mysqli_query($link,$query9);
while($row=mysqli_fetch_assoc($result))
{
	$usual_vff=$row['count'];
}
$result=mysqli_query($link,$query10);
while($row=mysqli_fetch_assoc($result))
{
	$usual_vfc=$row['count'];
}
$result=mysqli_query($link,$query11);
while($row=mysqli_fetch_assoc($result))
{
	$usual_nvff=$row['count'];
}
$result=mysqli_query($link,$query12);
while($row=mysqli_fetch_assoc($result))
{
	$usual_nvfc=$row['count'];
}
$result=mysqli_query($link,$query13);
while($row=mysqli_fetch_assoc($result))
{
	$milkcount=$row['count'];
}

//coupon part veg

$query1="SELECT count(id) as count from coupon where Menu='VEG' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VEG' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponveglunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VEG' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegdinner=$row['count'];
}


//couponveg+chicken


$query1="SELECT count(id) as count from coupon where Menu='VC' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegchickenbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VC' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegchickenlunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VC' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegchickendinner=$row['count'];
}


//coupon veg+egg

$query1="SELECT count(id) as count from coupon where Menu='VE' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegeggbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VE' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegegglunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VE' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegeggdinner=$row['count'];
}

//coupon veg+fish

$query1="SELECT count(id) as count from coupon where Menu='VF' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VF' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishlunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VF' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishdinner=$row['count'];
}
$query1="SELECT count(id) as count from coupon where Menu='VFF' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishfrybreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VFF' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishfrylunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VFF' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishfrydinner=$row['count'];
}
$query1="SELECT count(id) as count from coupon where Menu='VFC' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishcurrybreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VFC' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishcurrylunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='VFC' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponvegfishcurrydinner=$row['count'];
}

//coupon non veg

$query1="SELECT count(id) as count from coupon where Menu='NV' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnonvegbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NV' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnonveglunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NV' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnonvegdinner=$row['count'];
}


//coupon nonveg-chicken

$query1="SELECT count(id) as count from coupon where Menu='NVC' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvcbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVC' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvclunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVC' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvcdinner=$row['count'];
}


//coupon non veg minus egg

$query1="SELECT count(id) as count from coupon where Menu='NVE' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvebreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVE' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvelunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVE' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvedinner=$row['count'];
}


$query1="SELECT count(id) as count from coupon where Menu='NVF' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfbreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVF' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvflunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVF' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfdinner=$row['count'];
}
$query1="SELECT count(id) as count from coupon where Menu='NVFF' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfishfrybreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVFF' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfishfrylunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVFF' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfishfrydinner=$row['count'];
}
$query1="SELECT count(id) as count from coupon where Menu='NVFC' and Breakfast=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfishcurrybreakfast=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVFC' and Lunch=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfishcurrylunch=$row['count'];
}

$query1="SELECT count(id) as count from coupon where Menu='NVFC' and Dinner=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponnvfishcurrydinner=$row['count'];
}


//tea part
$query1="SELECT count(id) as count from coupon where Tea=1 OR TeaSnacks=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$coupontea=$row['count'];
}

$query1="SELECT count(id) as count from messjoin where active=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$usualtea=$row['count'];
}

$query1="SELECT count(id) as count from coupon where TeaSnacks=1 OR Snacks=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$couponsnacks=$row['count'];
}

$query1="SELECT count(id) as count from messjoin where active=1";
$result=mysqli_query($link,$query1);
while($row=mysqli_fetch_assoc($result))
{
	$usualsnacks=$row['count'];
}









?>






<HTML>

<head>
<title>Count</title>

</head>
<link rel="stylesheet" href="count.css">
<body>
	<div class="background">
	</div>
  <p><strong></p>


<!-- <table>
	<tr>
	  <td>Menu</td>
	  <td>Breakfast</td>
	  <td>Lunch</td>
	  <td>Dinner</td>
	</tr>
	<tr>
	  <td>Veg</td>
	  <td><?php echo ($usual_v+$couponvegbreakfast); ?></td>
	  <td><?php echo ($usual_v+$couponveglunch); ?></td>
	  <td><?php echo ($usual_v+$couponvegdinner); ?></td>
	</tr>
	<tr>
	  <td>Veg+Chicken</td>
	  <td><?php echo ($usual_vc+$couponvegchickenbreakfast); ?></td>
	  <td><?php echo ($usual_vc+$couponvegchickenlunch); ?></td>
	  <td><?php echo ($usual_vc+$couponvegchickendinner); ?></td>
	</tr>
	<tr>
	  <td>Veg+Fish</td>
	  <td><?php echo ($usual_vf+$couponvegfishbreakfast); ?></td>
	  <td><?php echo ($usual_vf+$couponvegfishlunch); ?></td>
	  <td><?php echo ($usual_vf+$couponvegfishdinner); ?></td>
	</tr>
	<tr>
	  <td>Veg+FishFry</td>
	  <td><?php echo ($usual_vff+$couponvegfishfrybreakfast); ?></td>
	  <td><?php echo ($usual_vff+$couponvegfishfrylunch); ?></td>
	  <td><?php echo ($usual_vff+$couponvegfishfrydinner); ?></td>
	</tr>
	<tr>
	  <td>Veg+FishCurry</td>
	  <td><?php echo ($usual_vfc+$couponvegfishcurrybreakfast); ?></td>
	  <td><?php echo ($usual_vfc+$couponvegfishcurrylunch); ?></td>
	  <td><?php echo ($usual_vfc+$couponvegfishcurrydinner); ?></td>
	</tr>
	<tr>
	  <td>Veg+Egg</td>
	  <td><?php echo ($usual_ve+$couponvegeggbreakfast); ?></td>
	  <td><?php echo ($usual_ve+$couponvegegglunch); ?></td>
	  <td><?php echo ($usual_ve+$couponvegeggdinner); ?></td>
	</tr>
	<tr>
	  <td>Non. Veg</td>
	  <td><?php echo ($usual_nv+$couponnonvegbreakfast); ?></td>
	  <td><?php echo ($usual_nv+$couponnonveglunch); ?></td>
	  <td><?php echo ($usual_nv+$couponnonvegdinner); ?></td>
	</tr>
	<tr>
	  <td>Non.Veg-Chicken</td>
	  <td><?php echo ($usual_nvc+$couponnvcbreakfast); ?></td>
	  <td><?php echo ($usual_nvc+$couponnvclunch); ?></td>
	  <td><?php echo ($usual_nvc+$couponnvcdinner); ?></td>
	</tr>
	<tr>
	  <td>Non.Veg-Egg</td>
	  <td><?php echo ($usual_nve+$couponnvebreakfast); ?></td>
	  <td><?php echo ($usual_nve+$couponnvelunch); ?></td>
	  <td><?php echo ($usual_nve+$couponnvedinner); ?></td>
	</tr>
	<tr>
	  <td>Non. Veg-Fish</td>
	  <td><?php echo ($usual_nvf+$couponnvfbreakfast); ?></td>
	  <td><?php echo ($usual_nvf+$couponnvflunch); ?></td>
	  <td><?php echo ($usual_nvf+$couponnvfdinner); ?></td>
	</tr>
	<tr>
	  <td>Non. Veg-FishFry</td>
	  <td><?php echo ($usual_nvff+$couponnvfishfrybreakfast); ?></td>
	  <td><?php echo ($usual_nvff+$couponnvfishfrylunch); ?></td>
	  <td><?php echo ($usual_nvff+$couponnvfishfrydinner); ?></td>
	</tr>
	<tr>
	  <td>Non. Veg-FishCurry</td>
	  <td><?php echo ($usual_nvfc+$couponnvfishcurrybreakfast); ?></td>
	  <td><?php echo ($usual_nvfc+$couponnvfishcurrylunch); ?></td>
	  <td><?php echo ($usual_nvfc+$couponnvfishcurrydinner); ?></td>
	</tr>
</table> -->

<div class="break">
<table id='break' border='4'>
<tr bgcolor='#979A9A'><th >BREAKFAST</th><th>COUNT</th></tr>
	<tr bgcolor='#D0D3D4'>
	<td>Veg</td>
	<td><?php echo ($usual_v + $usual_vc + $usual_ve+$usual_vf+$usual_vff+$usual_vfc+$couponvegbreakfast	+$couponvegchickenbreakfast+$couponvegeggbreakfast+$couponvegfishbreakfast+$couponvegfishfrybreakfast+$couponvegfishcurrybreakfast); ?></td>
</tr>
<tr bgcolor='#979A9A'>
<td>Non Veg</td>
<td><?php echo ($usual_nv+$usual_nvc+$usual_nvf+$usual_nve+$usual_nvff+$usual_nvfc+$couponnonvegbreakfast+$couponnvcbreakfast+$couponnvebreakfast+$couponnvfbreakfast+$couponnvfishfrybreakfast+$couponnvfishcurrybreakfast);?></td>
</tr>
    <tr bgcolor='#D0D3D4'>
 		<td>Chicken</td>
 		<td><?php echo ($usual_vc+$couponvegchickenbreakfast)+($usual_nv+$couponnonvegbreakfast)+($usual_nve+$couponnvebreakfast)+($usual_nvf+$couponnvfbreakfast)+($usual_nvff+$couponnvfishfrybreakfast)+($usual_nvfc+$couponnvfishcurrybreakfast)?></td>
 	</tr>
 	<tr bgcolor='#979A9A'>
 		<td>Fish</td>
 		<td><?php echo ($usual_vf+$couponvegfishbreakfast)+($usual_nv+$couponnonvegbreakfast)+($usual_nve+$couponnvebreakfast)+($usual_nvc+$couponnvcbreakfast)+($usual_nvff+$couponnvfishfrybreakfast)+($usual_nvfc+$couponnvfishcurrybreakfast)?></td>
 	</tr>
	<tr bgcolor='#D0D3D4'>
 		<td>Fish Fry</td>
 		<td><?php echo ($usual_vff+$couponvegfishfrybreakfast)+($usual_nv+$couponnonvegbreakfast)+($usual_nve+$couponnvebreakfast)+($usual_nvc+$couponnvcbreakfast)+($usual_nvf+$couponnvfbreakfast)+($usual_nvfc+$couponnvfishcurrybreakfast)?></td>
 	</tr>
	<tr bgcolor='#979A9A'>
 		<td>Fish Curry</td>
		<td><?php echo ($usual_vfc+$couponvegfishcurrybreakfast)+($usual_nv+$couponnonvegbreakfast)+($usual_nve+$couponnvebreakfast)+($usual_nvc+$couponnvcbreakfast)+($usual_nvf+$couponnvfbreakfast)+($usual_nvff+$couponnvfishfrybreakfast)?></td>
 	</tr>
 	<tr bgcolor='#D0D3D4'>
 		<td>Egg</td>
 		<td><?php echo ($usual_ve+$couponvegeggbreakfast)+($usual_nv+$couponnonvegbreakfast)+($usual_nvc+$couponnvcbreakfast)+($usual_nvf+$couponnvfbreakfast)+($usual_nvff+$couponnvfishfrybreakfast)+($usual_nvfc+$couponnvfishcurrybreakfast)?></td>
 	</tr>


  </table>
</div>
<br>
<br>
<div class="lunch">


	<table id='lunch' border='4'><tr bgcolor='#979A9A'><th>LUNCH</th><th>COUNT</th></tr>

	<tr bgcolor='#D0D3D4'>
	<td>Veg</td>
	<td><?php echo ($usual_v + $usual_vc + $usual_ve+$usual_vf+$usual_vff+$usual_vfc+$couponveglunch	+$couponvegchickenlunch+$couponvegegglunch+$couponvegfishlunch+$couponvegfishfrylunch+$couponvegfishcurrylunch); ?></td>
</tr>
<tr bgcolor='#979A9A'>
<td>Non Veg</td>
<td><?php echo ($usual_nv+$usual_nvc+$usual_nvf+$usual_nve+$usual_nvff+$usual_nvfc+$couponnonveglunch+$couponnvclunch+$couponnvelunch+$couponnvflunch+$couponnvfishfrylunch+$couponnvfishcurrylunch);?></td>
</tr>
    <tr bgcolor='#D0D3D4'>
 		<td>Chicken</td>
 		<td><?php echo ($usual_vc+$couponvegchickenlunch)+($usual_nv+$couponnonveglunch)+($usual_nve+$couponnvelunch)+($usual_nvf+$couponnvflunch)+($usual_nvff+$couponnvfishfrylunch)+($usual_nvfc+$couponnvfishcurrylunch)?></td>
 	</tr>
 	<tr bgcolor='#979A9A'>
 		<td>Fish</td>
 		<td><?php echo ($usual_vf+$couponvegfishlunch)+($usual_nv+$couponnonveglunch)+($usual_nve+$couponnvelunch)+($usual_nvc+$couponnvclunch)+($usual_nvff+$couponnvfishfrylunch)+($usual_nvfc+$couponnvfishcurrylunch)?></td>
 	</tr>
	<tr bgcolor='#D0D3D4'>
 		<td>Fish Fry</td>
 		<td><?php echo ($usual_vff+$couponvegfishfrylunch)+($usual_nv+$couponnonveglunch)+($usual_nve+$couponnvelunch)+($usual_nvc+$couponnvclunch)+($usual_nvf+$couponnvflunch)+($usual_nvfc+$couponnvfishcurrylunch)?></td>
 	</tr>
	<tr bgcolor='#979A9A'>
 		<td>Fish Curry</td>
		<td><?php echo ($usual_vfc+$couponvegfishcurrylunch)+($usual_nv+$couponnonveglunch)+($usual_nve+$couponnvelunch)+($usual_nvc+$couponnvclunch)+($usual_nvf+$couponnvflunch)+($usual_nvff+$couponnvfishfrylunch)?></td>
 	</tr>
 	<tr bgcolor='#D0D3D4'>
 		<td>Egg</td>
 		<td><?php echo ($usual_ve+$couponvegegglunch)+($usual_nv+$couponnonveglunch)+($usual_nvc+$couponnvclunch)+($usual_nvf+$couponnvflunch)+($usual_nvff+$couponnvfishfrylunch)+($usual_nvfc+$couponnvfishcurrylunch)?></td>
 	</tr>


  </table>
</div>
<div class="dinner">


	<table id='dinner' border='4'><tr bgcolor='#979A9A'><th>DINNER</th><th>COUNT</th></tr>

	<tr bgcolor='#D0D3D4'>
	<td>Veg</td>
	<td><?php echo ($usual_v + $usual_vc + $usual_ve+$usual_vf+$usual_vff+$usual_vfc+$couponvegdinner	+$couponvegchickendinner+$couponvegeggdinner+$couponvegfishdinner+$couponvegfishfrydinner+$couponvegfishcurrydinner); ?></td>
</tr>
<tr bgcolor='#979A9A'>
<td>Non Veg</td>
<td><?php echo ($usual_nv+$usual_nvc+$usual_nvf+$usual_nve+$usual_nvff+$usual_nvfc+$couponnonvegdinner+$couponnvcdinner+$couponnvedinner+$couponnvfdinner+$couponnvfishfrydinner+$couponnvfishcurrydinner);?></td>
</tr>
    <tr bgcolor='#D0D3D4'>
 		<td>Chicken</td>
 		<td><?php echo ($usual_vc+$couponvegchickendinner)+($usual_nv+$couponnonvegdinner)+($usual_nve+$couponnvedinner)+($usual_nvf+$couponnvfdinner)+($usual_nvff+$couponnvfishfrydinner)+($usual_nvfc+$couponnvfishcurrydinner)?></td>
 	</tr>
 	<tr bgcolor='#979A9A'>
 		<td>Fish</td>
 		<td><?php echo ($usual_vf+$couponvegfishdinner)+($usual_nv+$couponnonvegdinner)+($usual_nve+$couponnvedinner)+($usual_nvc+$couponnvcdinner)+($usual_nvff+$couponnvfishfrydinner)+($usual_nvfc+$couponnvfishcurrydinner)?></td>
 	</tr>
	<tr bgcolor='#D0D3D4'>
 		<td>Fish Fry</td>
 		<td><?php echo ($usual_vff+$couponvegfishfrydinner)+($usual_nv+$couponnonvegdinner)+($usual_nve+$couponnvedinner)+($usual_nvc+$couponnvcdinner)+($usual_nvf+$couponnvfdinner)+($usual_nvfc+$couponnvfishcurrydinner)?></td>
 	</tr>
	<tr bgcolor='#979A9A'>
 		<td>Fish Curry</td>
		<td><?php echo ($usual_vfc+$couponvegfishcurrydinner)+($usual_nv+$couponnonvegdinner)+($usual_nve+$couponnvedinner)+($usual_nvc+$couponnvcdinner)+($usual_nvf+$couponnvfdinner)+($usual_nvff+$couponnvfishfrydinner)?></td>
 	</tr>
 	<tr bgcolor='#D0D3D4'>
 		<td>Egg</td>
 		<td><?php echo ($usual_ve+$couponvegeggdinner)+($usual_nv+$couponnonvegdinner)+($usual_nvc+$couponnvcdinner)+($usual_nvf+$couponnvfdinner)+($usual_nvff+$couponnvfishfrydinner)+($usual_nvfc+$couponnvfishcurrydinner)?></td>
 	</tr>


  </table>
</div>
 <br>
 <br>

<div class ="tands">
	<table id='tands' border='4'><tr bgcolor='#979A9A'><th>TEA and SNACKS</th><th>COUNT</th></tr>

    <tr bgcolor='#D0D3D4'>
 		<td>Tea</td>
 		<td><?php echo ($usualtea+$coupontea)?></td>
 	</tr>
 	<tr bgcolor='#979A9A'>
 		<td>Snacks</td>
 		<td><?php echo ($usualsnacks+$couponsnacks)?></td>
 	</tr>

</table>
</div>
<br><br>
<div class ="milk">

	<table id='milk' border='4'><tr bgcolor='#979A9A'></tr>
    <tr bgcolor='#D0D3D4'>
 		<td><?php echo ($milkcount)?></td>
 	</tr>

</table>
</div>


</body>

</HTML>
