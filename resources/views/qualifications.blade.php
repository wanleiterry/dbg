@extends('home')

@section('content')
<div class="col-md-9 col-sm-9 col-xs-12">
	<div class="qualifications">
		<div class="qualifications_info">						
			<span class="pull-left">企业资讯</span>
			<div class="clearfix"></div>
		</div>
		<div class="qualifications_main">
			<ul class="list-unstyled" id="newslist">
			</ul>
            <div class="page_select clearfix">
            	<div class="pull-left record">
                	<p>共<span>236</span>条记录</p>
                </div>
                <div class="pull-right">
                	<nav>
                    	<ul class="pagination">
                        	<li class="disabled">
                            	<a href="#" aria-label="Previous">
                                	<span aria-hidden="true">&laquo;</span>
                            	</a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>
                            	<a href="#" aria-label="Next">
                                	<span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
		</div>
	</div>
</div>
			
<script>
	$(function(){
		$.ajax({
			url: 'news/list.json',
			type: "post",
			dataType: "json",
			data: '',
			success: function(data){
				console.log(data);
				var str = "";
				for(var i=0;i<8;i++){
					str+='<li><a href="news_detail.html">室外装修最新公告';
					str+='<span class="pull-right">2016.03.01</span>';
					str+='<div class="clearfix"></div></a></li>';
				}
				$('#newslist').html(str);
			}
		});	
	})
</script>
@endsection