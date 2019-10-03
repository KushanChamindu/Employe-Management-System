$(document).ready(function(){

	function load_unseen_notification(view = ''){	
		$.ajax({	
			url:"admin_fetch_notification.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
				$('.dropdown-menu').html(data.notification);
				if(data.unseen_notification > 0)
				{
					$('.count').html(data.unseen_notification);
				}
			}
		});
	}
    load_unseen_notification();
    setTimeout(load_unseen_notification, 100);
	

	
	$(document).on('click', '.dropdown-menu', function(){
		$('.count').html('');
	});
    
    $(document).on('click', '.notify-li', function(){
		$('.count').html('');
        $li_id=$(this).attr('id');
		load_unseen_notification($li_id);	
	});
	
});

//$('a.menu').bind('click', function(){
//    alert($(this).attr('id')); // gets the id of a clicked link that has a class of menu
//});

//function explode(){
//  alert("Boom!");
//}
//setTimeout(explode, 2000);