@extends('home')

@section('content')
<div class="col-md-9 col-sm-9 col-xs-12">
	<div class="Contacts_us">
		<div class="Contacts_title">
			<span class="pull-left">联系我们</span>
			<div class="clearfix"></div>
		</div>
		<div class="Contacts_main">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>公司名称</th>
						<td>大表哥有限公司</td>
					</tr>
					<tr>
						<th>联系人</th>
						<td>大表哥</td>
					</tr>
					<tr>
						<th>电话</th>
						<td>0576-12345678</td>
					</tr>
					<tr>
						<th>传真</th>
						<td>0576-12345678</td>
					</tr>
					<tr>
						<th>地址</th>
						<td>浙江 台州 天台县 中国 浙江 台州市 天台县始丰街道晚山张</td>
					</tr>
					<tr>
						<th>邮编</th>
						<td>317200</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="Map">
		<div class="Map_title">
			<span class="pull-left">公司地图</span>
			<div class="clearfix"></div>
		</div>
		<div class="Map_main">
			<div id="allmap"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Gjj6V2QPM0w1sYqS7eH9Y6aAxODpvfGg"></script>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");    // 创建Map实例
	map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
	map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
	map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>
@endsection