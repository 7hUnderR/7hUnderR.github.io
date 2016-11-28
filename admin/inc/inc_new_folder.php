<? 
	switch($bac){
		case "1":
			$add_folder=gia_tri_mot_cot('tb_config','id',1,'add_folder_step_1');
			break;
		case "2":
			$add_folder=gia_tri_mot_cot('tb_config','id',1,'add_folder_step_2');
			break;
		case "3":
			$add_folder=gia_tri_mot_cot('tb_config','id',1,'add_folder_step_3');
			break;
		case "4":
			$add_folder=gia_tri_mot_cot('tb_config','id',1,'add_folder_step_4');
			break;
		case "5":
			$add_folder=gia_tri_mot_cot('tb_config','id',1,'add_folder_step_5');
			break;
		default:
			break;
	}

	
	if($add_folder==1)
	{
	if($suid==1) 
	 echo"[<a href=\"admin_news_folder.php?ma_add=catalog&bac=$bac&cat=$cat&start=$start&alpha=$alpha&lg=$lg\">$main_new_folder</a>]";
	}
	?>