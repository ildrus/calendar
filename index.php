<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<?php	
		define("DAYS",7);
		define("WEEKS",6);
		$daysThisMonth= date("t");
		$year=date("o");
		$month=date("m");
		$nombredia="".$year."-".$month."-01";
		$dias=array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
		$dataStart=$dias[date('N', strtotime($nombredia))];
		$startNumericNameDay=0;
		for($i=0;$i<count($dias);$i++){
			if($dias[$i]==$dataStart){
				$startNumericNameDay=$i-1;
			}
		}
		$count=1;
		for($i=0;$i<WEEKS;$i++){
			for($j=0;$j<DAYS;$j++){
				if((($i==0)&($j<$startNumericNameDay))|($count>$daysThisMonth)){
					$calendar[$i][$j]="";
				}
				else{
					$calendar[$i][$j]=$count;
					$count++;
				}					
			}
		}		
	?>	
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
	<table name="calendar">
		<tbody>			
		<?php	
			$monthName=date("F");
			$thisDay = date("j");
			$diesSetmanes=array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
			echo "<tr class='month'>";
			echo "<th colspan=7>".$monthName."</th>";
			echo "</tr>";
			echo "<tr class='tHead'>";
			for ($i=0; $i<count($diesSetmanes) ; $i++) { 
				echo "<th>".$diesSetmanes[$i]."</th>";
			}
			echo "</tr>";			
			for($i=0;$i<WEEKS;$i++){
				echo "<tr>";
				for ($j=0; $j < DAYS; $j++) { 
					$day=$calendar[$i][$j];
					if($day==$thisDay){
						echo "<td class='cell toDay'>".$day."</td>";
					}
					elseif($day==""){
						echo "<td class='cell empty'>".$day."</td>";
					}
					else{
						echo "<td class='cell'>".$day."</td>";
					}
				}
				echo "</tr>";
			}				
		?>	
		</tbody>		
	</table>	
</FORM>
</body>
</html>