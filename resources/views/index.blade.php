@extends('home')

@section('content')
<div class="col-md-9 col-sm-9 col-xs-12">
	<div class="company">
		<div class="introduce">
			<span class="pull-left">公司简介</span>
			<a href="about.html" class="pull-right">更多></a>
			<div class="clearfix"></div>
		</div>
		<div class="introduce_main">
			<div class="company_pic">
				<span>
            		<img src="../images/company.jpg" width="200" alt="大表哥有点公司">
        		</span>
        	</div>
        	<div class="company_info">
		        <p>台州亿恒装饰——是浙江知名的装饰材料生产商。始创于90年代初，是一家集设计、生产、施工于一体的多元化公司。本公司拥有一支超强的团队，精湛的技术，犹如鬼斧神工，雕刻出一幅幅栩栩如生的艺术。亿恒公司不仅是中国GRC协会的会员单位、中国建筑装饰协会的会员单位、而且在业内率先通过ISO9001:2008国际质量管理体系认证，荣膺“全国GRC产品30家市场放心品牌”称号，并应邀参加上海世博会民企联合馆活动，享誉中外。 </p>
	        </div>
		</div>
	</div>
	<div class="product">
		<div class="product_title">
			<span class="pull-left">最新案例</span>
			<a href="supply.html" class="pull-right">更多></a>
			<div class="clearfix"></div>
		</div>
		<div class="product_new row">
		</div>
	</div>
</div>
@endsection