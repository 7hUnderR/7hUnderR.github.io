<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT language=JavaScript1.2 src="menu_sothink/stm31.js" type=text/javascript></SCRIPT>
<script language="javascript">
			stm_bm(["menu63b0",430,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0],this);
			stm_bp("p0",[0,4,0,0,0,0,0,0,100,"",-2,"",-2,50,0,0,"#ffffff","transparent","",3,0,0,"#FFFFFF"]);
			<?
			$i=0;
			$i_bg=0;
			$query = "Select * FROM  tb_bac_1 where trang in ('2','7','17','12','25','96') and activate=1 and activate_setup=1 order by thu_tu ASC ";
			$result = mysql_query($query);
			$num_menu = mysql_num_rows($result);
			while($rs= mysql_fetch_array($result))
			{
		    $i_bg++;
			$ten=$rs["ten_$lg"];
			$ma_bac_1=$rs["ma_bac_1"];
			if($lg=="vn")
			{
			 //$ten_anh=$rs["anh"];
			 //$ten_anh_lon=$rs["anh_lon"];
			 $ten_anh="bt".$i_bg."_vn.gif";
			 $ten_anh_lon="bt".$i_bg."_vn_hover.gif";
			}
			else
			{
			 //$ten_anh=$rs["anh_1"];
			 //$ten_anh_lon=$rs["anh_1_lon"];
			 $ten_anh="bt".$i_bg.".gif";
			 $ten_anh_lon="bt".$i_bg."_hover.gif";
			}
		  
		  $mau_bg="#07a9ec";
		  $mau_bg_over="#00438b";

		  /*switch($i_bg)
			 {
				case "1":
					  $mau_bg="#ff3299";
					  $mau_bg_over="#fe71b8";
					break;
				case "2":
					  $mau_bg="#ff6600";
					  $mau_bg_over="#ff3600";
					break;
				case "3":
					  $mau_bg="#0099ff";
					  $mau_bg_over="#005aff";
					break;
				case "4":
					  $mau_bg="#66cc00";
					  $mau_bg_over="#4a9201";
					break;
				case "5":
					  $mau_bg="#ee4354";
					  $mau_bg_over="#ff5a00";
					break;
				case "6":
					  $mau_bg="#880088";
					  $mau_bg_over="#e600e6";
					break;
				default:
					  $mau_bg="#ff3299";
					  $mau_bg_over="#ff3299";
					break;
			}		*/	
			
			
			$num=dem_max_2dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1);
			if($num>0)
			    $link="javascript:;";
			else
			    $link="./?Acat=$rs[ma_bac_1]&lg=$lg&start=0";
			?>
			stm_ai("p0i<?=$i?>",[2,"<?=$ten?>","images/<?=$ten_anh?>","images/<?=$ten_anh_lon?>",-1,-1,0,"<?=$link?>","_self","","","","",0,0,0,"","",0,0,0,0,1,"#FFFFFF",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#ffffff","#FFFFFF","#ffffff","11px tahoma","11px tahoma",0,0]);
			stm_bpx("p1","p0",[1,4,0,0,1,1,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.60)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.60)",4,50,0,0,"#FFFFFF","#ffffff"]);
			<?
			$j=0;
			$result_=select_co_3dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1,"activate_setup",1,"thu_tu","ASC");
			while($rs_= mysql_fetch_array($result_))
			{
			$ma_bac_2=$rs_["ma_bac_2"];
			$ten_tp=$rs_["ten_$lg"];
			
			$num=dem_max_2dk("tb_bac_3","ma_bac_2",$ma_bac_2,"activate",1);
			/*if($num>0)
			  {
				$ma_bac_3=gia_tri_mot_cot("tb_bac_3","ma_bac_2",$ma_bac_2,"ma_bac_3");
				$link="./?Ccat=$ma_bac_3&lg=$lg&start=0";
			  }
			else*/
			$link="./?Bcat=$rs_[ma_bac_2]&lg=$lg&start=0";
			?>
				stm_aix("p2i<?=$j?>","p0i0",[0,"  <?=$ten_tp?>  ","","",-1,-1,0,"<?=$link?>","_self","","","","",0,0,0,"","",0,0,0,0,1,"<?=$mau_bg?>",0,"<?=$mau_bg_over?>",0,"","",3,3,0,0,"#ffffff","#ffffff","#FFFFFF","#ffffff","11px tahoma","11px tahoma",0,0]);
				stm_bpx("p3","p1",[1,2,0,0,1,1,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.60)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.60)",4,50,0,0,"#FFFFFF","#ffffff"]);
					<?
					$k=0;
					$result__=select_co_3dk("tb_bac_3","ma_bac_2",$ma_bac_2,"activate",1,"activate_setup",1,"thu_tu","ASC");
					while($rs__= mysql_fetch_array($result__))
					{
					
					$ten_dv_ct=$rs__["ten_$lg"];
					$link="./?Ccat=$rs__[ma_bac_3]&lg=$lg&start=0";
					?>
					stm_aix("p3i<?=$k?>","p0i0",[0,"  <?=$ten_dv_ct?>  ","","",-1,-1,0,"<?=$link?>","_self","","","","",1,1,0,"","",0,0,0,0,1,"<?=$mau_bg?>",0,"<?=$mau_bg_over?>",0,"","",3,3,0,0,"#ffffff","#ffffff"]);
					<? $k++; } ?>
				stm_ep();
			    <? $j++; } ?>
			stm_ep();
			<? $i++;
			if($i< $num_menu)
			{?>
			stm_aix("p0i1","p0i0",[0,"","","",24,28,0,"","_self","","","","",0,0,0,"","",0,0,0,0,1,"#ffffff",1,"#ffffff",1,"","",3,3,0,0,"#ffffff","#000000","#000000","#000000","8pt Verdana","8pt Verdana"]);
			<?  } } ?>
			stm_em();
			        </script>