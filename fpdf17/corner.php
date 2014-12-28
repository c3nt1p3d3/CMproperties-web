<?php
require_once('fpdf.php');

function corner ($pdf, $cnr, $x, $y, $r) {
	
	// white to match document background
	$pdf->SetDrawColor(255,255,255);
	
	// define quad sectors in radians
	for ($i=0;$i<=2;$i+=0.5) {
		$lim[] = $i*pi();
	}
	
	// find x and y of virtual circle origin
	$d = $r-0.2; // you get neater ends if it's a little bit offset
	$ox = $x + ($cnr>1&&$cnr<4 ? $d : -$d);
	$oy = $y + ($cnr>2 ? +$d : -$d);
	
	$step = 1/($r*10); // more lines if it's larger
	for ($a=$lim[$cnr-1];$a<=$lim[$cnr]+$step;$a+=$step) {
		$yy = $r*sin($a);
		$xx = $r*cos($a);
		$pdf->Line($x,$y,$ox+$xx,$oy+$yy);
	}
	
}
?>