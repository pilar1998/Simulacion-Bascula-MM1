<?php 
	$lam=$_POST['lambda'];
	$miu=$_POST['miu'];
	$n=$_POST['n'];
	$ser=2;
	$p=$lam/$miu;
	$pow0=pow($p,0);
	$pow1=pow($p,1);
	$pow2=pow($p,2);
	$fac0=fact(0);
	$fac1=fact(1);
	$fac2=fact(2);
	$p0=1-$p;
	$pp0=($p0*100);
	echo "<h3>Probabilidad que ningun cliente este en el sistema:</h3>";
	echo "<h3>Aproximadamente el ".round($pp0)."% del tiempo, la estacion de pesado esta vacia.</h3>";
	echo "<br>";
	$pow3=pow($p,3);
	$l2=2-$p;
	$powl2=pow($l2,2);
	$lq=($pow2)/(1-$p);	
	$ca=round($lq);
	echo "<h3>Numero promedio en la fila:</h3>";
	echo "<h3>En promedio la estacion de pesado puede tener aproximadamente ".($ca)." camiones esperando para obtener el servicio (sin incluir al que ya esta en la bascula).</h3>";
	echo "<br>";
	$wq=$lq/$lam;
	$min=$wq*60;
	echo "<h3>Tiempo promedio de espera en la cola:</h3>";
	echo "<h3>En promedio un camion tiene que esperar ".round($wq,4)." horas, aproximadamente ".round($min)." minutos, en la fila antes de iniciar el proceso de pesado.</h3>";
	echo "<br>";
	$w=$wq+(1/$miu);
	$min2=($w*60);
	echo "<h3>Tiempo promedio de espera en el sistema:</h3>";
	echo "<h3>En promedio un camion tiene que esperar ".round($w,4)." horas, aproximadamente ".round($min2)." minutos, desde que llega hasta que sale de la estacion.</h3>";
	echo "<br>";
	$l=$lam*$w;
	$ca2=round($l);
	echo "<h3>Numero promedio en el sistema:</h3>";
	echo "<h3>En promedio existe un total de ".$ca2." camiones esperando en la estacion, ya sea en la bascula o en espera de ser atendidos.</h3>";
	echo "<br>";
	$pw=(1-$p0);
	$ppw=($pw*100);
	$inve=(100-$ppw);
	echo "<h3>Probabilidad de que un cliente que llega tenga que esperar:</h3>";
	echo "<h3>Aproximadamente ".round($ppw)."% de las veces que llega un camion tiene que esperar o, de manera equivalente, aproximadamente ".round($inve)."% de las veces un camion que llega es pesado sin tener que esperar.</h3>";
	echo "<br>";
	echo "<h3>Probabilidad de que hallan n clientes:</h3>";
	echo "<br>";
	echo "<table class='table table-striped table-bordered table-condensed table-hover'>";
        echo "<thead>";
            echo "<th>n</th>";
            echo "<th>Probabilidad de n</th>";
        echo "</thead>";		
		for($i=0;$i<=$n;$i++){
				$pn[$i]=(pow($p,$i))*$p0;
		}		 
		$con=count($pn);
        for($i=0;$i<$con;$i++){
            echo "<tr>";
                echo "<td>";
                echo $i;
                echo "</td>";
                echo "<td>";
                echo round($pn[$i],4);
                echo "</td>";
            echo "</tr>";
        }       
	
	echo "</table>";
	echo "<br>";

	echo "<h3>Utilizacion de las basculas:</h3>";
	$u=$p*100;
	echo "<h3>Aproximadamente cada bascula esta ocupada ".round($u)."% del tiempo.</h3>";

	function fact($mi_fatorial)
	{
	   if($mi_fatorial==1||$mi_fatorial==0)
	      return 1;
	   else
	      return $mi_fatorial * fact($mi_fatorial-1);
	}
?>