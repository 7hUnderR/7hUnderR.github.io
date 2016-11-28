function doAction(file_id){
		var item_action = document.getElementById(file_id+'1');
		if(item_action){
			if(item_action.style.display=='none'){
				expanIt_TopBottom(file_id);
				expanIt(file_id);
			}
			else{
				closeIt(file_id);
				closeIt_TopBottom(file_id);
			}
		}
		return;
	}
	
function doAction_sub(file_id){
		var item_action = document.getElementById(file_id+'1');
		if(item_action){
			if(item_action.style.display=='none'){			
				expanIt(file_id);
			}
			else{
				closeIt(file_id)
			}
		}
		return;
	}
	
	function expanIt(file_id){
		var item_action;
		i = 1;
		item_action = document.getElementById(file_id+i);
		while(item_action){
			item_action.style.display='';
			i++;
			item_action = document.getElementById(file_id+i);
		}
		return ;
	}
	function expanIt_TopBottom(file_id){
		var item_action;
		item_action = document.getElementById(file_id+'top');
		if(item_action){
			item_action.style.display='';
		}
		item_action = document.getElementById(file_id+'bottom');
		if(item_action){
			item_action.style.display='';
		}
		return ;
	}
	function closeIt_TopBottom(file_id){
		var item_action;
		item_action = document.getElementById(file_id+'top');
		if(item_action){
			item_action.style.display='none';
		}
		item_action = document.getElementById(file_id+'bottom');
		if(item_action){
			item_action.style.display='none';
		}
		return ;
	}
	function closeIt(file_id){
		var item_action,item_action_sub;
		i = 1;
		item_action = document.getElementById(file_id+i);
		while(item_action){
			j = 1;
			item_action_sub = document.getElementById(file_id+i+j);
			while(item_action_sub){
				item_action_sub.style.display='none';
				j++;
				item_action_sub = document.getElementById(file_id+i+j);
			}
			item_action.style.display='none';
			i++;
			item_action = document.getElementById(file_id+i);
		}
		return ;
	}
	function autoExpan(){
		var file_id = getCookie('file_id');
		expanIt(file_id);
		var file_id_sub = getCookie('file_id_sub');
		expanIt(file_id_sub);
	}