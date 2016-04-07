@extends('home')

@section('content')
<div class="col-md-9 col-sm-9 col-xs-12 detail">
	<h3>省!省!省!沈阳新房装修预算省钱攻略【林凤装饰】</h3>
	<p>性价比是绝大多数装修人士的梦想，为了实现花最少的预算，拥有最完美的装修这一梦想，不少业主在装修前就到卖场东奔西走选建材，四方打听挑装修公司价格。实际上，林凤装饰在这里告诉大家，节省装修费用有迹可循，从几个大方向入手，就能将费用节省到点子上。</p>
	<p>性价比是绝大多数装修人士的梦想，为了实现花最少的预算，拥有最完美的装修这一梦想，不少业主在装修前就到卖场东奔西走选建材，四方打听挑装修公司价格。实际上，林凤装饰在这里告诉大家，节省装修费用有迹可循，从几个大方向入手，就能将费用节省到点子上。</p>
</div>

<script>
	$(function(){
		function getQueryString(name) {  
	        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");  
	        var r = window.location.search.substr(1).match(reg);  
	        if (r != null) return unescape(r[2]);  
	        return null;  
	    }  
	    var id=getQueryString('id');
		$.ajax({
			url: 'news/'+id+'.json',
			type: "post",
			dataType: "json",
			data: '',
			success: function(data){
				console.log(data);
			}
		});	
	})
</script>
@endsection