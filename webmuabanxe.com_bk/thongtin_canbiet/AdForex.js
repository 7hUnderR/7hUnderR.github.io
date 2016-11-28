		function ShowForexRate()
		{
			var vForex;
			vForex = '<div style="position:related;overflow-y:scroll;height:81px;width:100%;background-color:#ffffff;border-left: 1px solid #a8a8a8;">';
			for(var i=0;i<vForexs.length;i++){
				if (typeof(vForexs[i]) !='undefined' && typeof(vCosts[i]) !='undefined'){
					vForex += '<div style="float:left;width:100%;height:1px;font-size:1px;overflow:hidden;background-color:#a8a8a8;">&nbsp;</div>';					
					vForex += '<div style="width:38px;height:15px;float:left;text-align:left"><label class="box-item" style="padding-left:4px;line-height:15px;">'+ vForexs[i] +'</label></div>';
					vForex += '<div style="float:left;width:1px;height:15px;font-size:1px;overflow:hidden;background-color:#a8a8a8;">&nbsp;</div>';
					vForex += '<div style="width:70px;height:15px;float:left;text-align:right"><label class="box-item" style="padding-right:4px;line-height:15px;">'+ vCosts[i] +'</label></div>';					
					if (i == (vForexs.length-1)) {
					vForex += '<div style="float:left;width:100%;height:1px;font-size:1px;overflow:hidden;background-color:#a8a8a8;">&nbsp;</div>';
					}
				}
			}
			vForex += '</div>';
			document.getElementById("eForex").innerHTML = vForex;
		}
		ShowForexRate();

