@extends('index.layouts.layout')
@section('content')<!-- side nav right-->

<!-- slider -->
<div class="slider">

	<ul class="slides">
		<li>
			<img src="img/654.jpg" alt="">
			<div class="caption slider-content  center-align">
				<h2>欢迎来到 梦想商城</h2>
				<h4>Lorem ipsum dolor sit amet.</h4>
				<a href="/link" class="btn button-default">现在去购物</a>
			</div>
		</li>
		<li>
			<img src="img/757.jpg" alt="">
			<div class="caption slider-content center-align">
				<h2>欢迎来到 梦想商城</h2>
				<h4>Lorem ipsum dolor sit amet.</h4>
				<a href="/link" class="btn button-default">现在去购物</a>
			</div>
		</li>
		<li>
			<img src="img/974.jpg" alt="">
			<div class="caption slider-content center-align">
				<h2>欢迎来到 梦想商城</h2>
				<h4>Lorem ipsum dolor sit amet.</h4>
				<a href="/link" class="btn button-default">现在去购物</a>
			</div>
		</li>
	</ul>

</div>
<!-- end slider -->

<!-- features -->

<div class="features section">
	<div class="container">
		<div class="row">
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-car"></i>
					</div>
					<h6>免费送货</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-dollar"></i>
					</div>
					<h6>退款</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
		</div>
		<div class="row margin-bottom-0">
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
					<h6>安全付款</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
			<div class="col s6">
				<div class="content">
					<div class="icon">
						<i class="fa fa-support"></i>
					</div>
					<h6>24/7 支持</h6>
					<p>Lorem ipsum dolor sit amet consectetur</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end features -->

<!-- quote -->
<div class="section quote">
	<div class="container">
		<h4>FASHION UP TO 50% OFF</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
	</div>
</div>
<!-- end quote -->

<!-- product -->
<div class="section product">
	<div class="container">
		<div class="section-head">
			<h4>NEW PRODUCT</h4>
			<div class="divider-top"></div>
			<div class="divider-bottom"></div>
		</div>
		<div class="row">@foreach($res as $v)
				<div class="col s6">
					<div class="content" goods_id="{{$v['goods_id']}}">
						<a href="/details/{{$v['goods_id']}}">	<img src="{{$v['goods_img']}}" alt=""></a>
						<h6><font color="#8a2be2">{{$v['goods_name']}}</font></h6>
						<div class="price">
							${{$v['goods_price']}}
						</div>

						<a href="index/fonts.php">点击我收藏</a>

						<button class="btn button-default" id="btn"><font color="#ff8c00">添加到购物车</font></button>

					</div>

				</div>@endforeach
		</div>

	</div>
</div>
<!-- end product -->	<!-- end promo -->

<!-- product -->
<div class="section product">
	<div class="pagination-product">
		<ul>
			<li class="active">1</li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
		</ul>
	</div>

</div>
<!-- end product -->

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->

<!-- scripts -->
<script src="/static/index/js/jquery.min.js"></script>
<script src="/static/index/js/materialize.min.js"></script>
<script src="/static/index/js/owl.carousel.min.js"></script>
<script src="/static/index/js/fakeLoader.min.js"></script>
<script src="/static/index/js/animatedModal.min.js"></script>
<script src="/static/index/js/main.js"></script>

</body>
</html>
<script>
	$(document).on('click','#btn',function(){
		//当前点击的对象
		var _this=$(this);
		//购买数量
		var buy_number=1;
		//获取商品id
		var goods_id=_this.parent().attr("goods_id");
		$.ajax({
			url:'/addCart',
			type:'post',
			data:{buy_number:buy_number,goods_id:goods_id},
			dataType:'json',
			success:function(res){
				if(res.code==true){
					window.location.href='/cart';
				}else{
					alert(res.font);
				}
			}
		})
	})
</script>
@include("index.layouts.foot")
@endsection

