<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<? 
	switch($bac){
		case "1":
			$ma_trang=gia_tri_mot_cot('tb_bac_1','ma_bac_1',$cat,'trang');
			$file_add=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_add');
			$file_edit=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_edit');
			$file_delete=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_delete');
			$tb_setup=gia_tri_mot_cot_2dk('tb_setup','ma_bac',$bac,'ma_dm',$ma_trang,'tb');
			break;
		case "2":
			$ma_trang=gia_tri_mot_cot('tb_bac_2','ma_bac_2',$cat,'trang');
			$file_add=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_add');
			$file_edit=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_edit');
			$file_delete=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_delete');
			$tb_setup=gia_tri_mot_cot_2dk('tb_setup','ma_bac',$bac,'ma_dm',$ma_trang,'tb');
			break;
		case "3":
			$ma_trang=gia_tri_mot_cot('tb_bac_3','ma_bac_3',$cat,'trang');
			$file_add=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_add');
			$file_edit=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_edit');
			$file_delete=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_delete');
			$tb_setup=gia_tri_mot_cot_2dk('tb_setup','ma_bac',$bac,'ma_dm',$ma_trang,'tb');
			break;
		case "4":
			$ma_trang=gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat,'trang');
			$file_add=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_add');
			$file_edit=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_edit');
			$file_delete=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_delete');
			$tb_setup=gia_tri_mot_cot_2dk('tb_setup','ma_bac',$bac,'ma_dm',$ma_trang,'tb');
			break;
		case "5":
			$ma_trang=gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat,'trang');
			$file_add=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_add');
			$file_edit=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_edit');
			$file_delete=gia_tri_mot_cot('tb_setup','ma_dm',$ma_trang,'file_delete');
			$tb_setup=gia_tri_mot_cot_2dk('tb_setup','ma_bac',$bac,'ma_dm',$ma_trang,'tb');
			break;
		default:
			break;
	}

	?>