<?php 
/**
 * summary
 */
class News extends Controller
{
	
	function Show($ho , $name)
	{
		echo $ho.' '.$name;
		$teo = $this->model("SinhVienModel");
		echo $teo->GetSV();
	}
	
}
?>