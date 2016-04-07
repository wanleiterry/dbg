@extends('home')

@section('content')
<div class="col-md-9 col-sm-9 col-xs-12">
	<div class="supply">
		<div class="supply_title">
			<span class="pull-left">企业案例</span>
			<div class="clearfix"></div>
		</div>
		<div class="supply_main">
			<ul class="list-inline hidden-xs">
				<li>
                	<a>GRC玻璃钢模具<span>(7)</span></a>
                </li>
                <li>
                                <a>EPS线条及构件<span>(13)</span></a>
                </li>
                <li>
                                <a>GRC构件<span>(59)</span></a>
                </li>
                <li>
                                <a>镜框系列<span>(2)</span></a>
                </li>
                <li>
                                <a>吊顶系列<span>(9)</span></a>
                </li>
                <li>
                                <a>花板系列<span>(36)</span></a>
                </li>
                <li>
                                <a>柱子系列<span>(4)</span></a>
                </li>
                <li>
                                <a>砂岩装饰板系列<span>(49)</span></a>
                </li>
                <li>
                                <a>浮雕系列<span>(17)</span></a>
                </li>
                <li>
                                <a>雕塑系列<span>(25)</span></a>
                </li>
                <li>
                                <a>花盆系列<span>(10)</span></a>
                </li>
                <li>
                                <a>招聘信息<span>(5)</span></a>
                </li>
			</ul>
                        <div class="supply_new row" id="supply_list">

                        </div>
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
                                        <li><a href="#">5</a></li>
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
    $.ajax({
        url: 'case/list.json',
        type: "post",
        dataType: "json",
        data: '',
        success: function(data){
            console.log(data);
            var str='';
            for(var i=0;i<10;i++){
                str+='<div class="col-md-3 col-sm-3 col-xs-6">';
                str+='<div class="thumbnail">';
                str+='<img src="../images/company.jpg" alt="...">';
                str+='<div class="caption">';
                str+='<p class="text-center">玻璃钢模具</p></div></div></div>';
            }
            $("#supply_list").html(str);
        }
    }); 
</script>
@endsection