	<?
				switch($bac){
					case '1':
						$cat = $HTTP_GET_VARS["cat"];
						$cat_s = 0;
						$cat_s_s = 0;
						$cat_s_s_s = 0;
						$cat_s_s_s_s = 0;
						break;
					case '2':
						$cat_s = $HTTP_GET_VARS["cat"];
						$cat = gia_tri_mot_cot('tb_bac_2','ma_bac_2',$cat_s,'ma_bac_1');
						$cat_s_s = 0;
						$cat_s_s_s = 0;
						$cat_s_s_s_s = 0;
						break;
					case '3':
						$cat_s_s = $HTTP_GET_VARS["cat"];
						$cat_s = gia_tri_mot_cot('tb_bac_3','ma_bac_3',$cat_s_s,'ma_bac_2');
						$cat = gia_tri_mot_cot('tb_bac_3','ma_bac_3',$cat_s_s,'ma_bac_1');									
						$cat_s_s_s = 0;
						$cat_s_s_s_s = 0;
						break;
					case '4':
						$cat_s_s_s = $HTTP_GET_VARS["cat"];
						$cat_s_s = gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat_s_s_s,'ma_bac_3');
						$cat_s = gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat_s_s_s,'ma_bac_2');
						$cat = gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat_s_s_s,'ma_bac_1');	
						$cat_s_s_s_s = 0;
						break;
					case '5':
						$cat_s_s_s_s = $HTTP_GET_VARS["cat"];
						$cat_s_s_s = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_4');
						$cat_s_s = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_3');
						$cat_s = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_2');
						$cat = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_1');										
						break;
					default:
						$cat = $HTTP_GET_VARS["cat"];
						$cat_s = '0';
						$cat_s_s = '0';
						$cat_s_s_s = '0';
						$cat_s_s_s_s = '0';
						break;
				}			   
?>