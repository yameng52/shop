@extends('index.layouts.layout')
@section('content')
	<div class="pages section">
		<div class="container">

			<div class="shop-single">
				<img src="{{$data['goods_img']}}" alt="">
				<div class="prism-player" id="player-con"></div>
				<h5>{{$data['goods_name']}}</h5>
				<div class="price">${{$data['goods_price']}} 
				<p>{{$data['goods_desc']}}</p>
				<button type="button" class="btn button-default" id="btn">加入购物车</button>
			</div>
			<div class="review">
					<h5>1 reviews</h5>
					<div class="review-details">
						<div class="row">
							<div class="col s3">
								<img src="img/user-comment.jpg" alt="" class="responsive-img">
							</div>
							<div class="col s9">
								<div class="review-title">
									<span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="">Reply</a></span>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
							</div>
						</div>
					</div>
				</div>	
				<div class="review-form">
					<div class="row">
						<form action="/cate" method="post" class="col s12 form-details">
							<div class="input-field">
								<input type="text" name="c_name" required class="validate" placeholder="您的名字">
							</div>
							<div class="input-field">
								<textarea name="neirong" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="您的评论"></textarea>
							</div>
							<div class="form-button">
								<input type="submit" class="btn button-default" value="发布您的评论">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end shop single -->
	<!-- end footer -->
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
	//购买数量
	var buy_number=1;
	//获取商品id
	var goods_id={{$data['goods_id']}};
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
});
var player = new Aliplayer({
  "id": "player-con",
  {{--"source": "/storage/{{$data['m3u8'] ?? ''}}",--}}
  "source": "/瑶狂杀.mp4",
  "width": "50%",
  "height": "300px",
  "autoplay": true,
  "isLive": false,
  "rePlay": false,
  "playsinline": true,
  "preload": true,
  "controlBarVisibility": "hover",
  "useH5Prism": true
}, function (player) {
    console.log("The player is created");
  }
);
</script>
@include("index.layouts.foot")
@endsection