<?
switch($bac)
 {
	case "1":
		   $trang=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"trang");
		break;
	case "2":
		   $trang=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"trang");
		break;
	case "3":
		   $trang=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"trang");
		break;
	case "4":
		   $trang=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"trang");
		break;
	case "5":
		   $trang=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"trang");
		break;
	default:
		$trang=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"trang");
		break;
 }

?>