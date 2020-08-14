@extends('index.layouts.layout')
@section('content')
<!-- cart -->
<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h2><font color="#ffe4c4">欢迎来到购物车</font></h2>
			</div>
			<div class="content">
				@if($cartInfo!=='')
				@foreach($cartInfo as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
						</div>
						<div class="col s7">
							<a href="/details/{{$v['goods_id']}}"><img src="{{$v['goods_img']}}" alt=""></a>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
						</div>
						<div class="col s7">
							<h5>商品名称：<font color="#8a2be2">{{$v['goods_name']}}</font></h5>

						</div>

					</div>
					<div class="row">
						<div class="col s5">
						</div>
						<div  goods_id="{{$v['goods_id']}}">
							商品数量：<input type="text" style="width:100px" value="{{$v['buy_number']}}" class="buy_number">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
						</div>
						<div class="col s7">
							商品价格<h5><font color="#7fff00">${{$v['buy_number']*$v['goods_price']}}</font></h5>
						</div>
					</div>
					
					<div class="row">
						<div class="col s5">
						</div>
						<div class="col s7" good_id="{{$v['goods_id']}}">
							<h5><i class="fa fa-trash del"></i></h5>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			<div class="total">
				<div class="row">
					<div class="col s7">
						<h6><font color="#d2691e">商品总价</font></h6>
					</div>
					<div class="col s5">
						<h6><font color="#9370db">${{$money}}</font></h6>
					</div>
				</div>
			</div>
			<button class="btn button-default"><a href="/"><font color="aqua">前往首页</font></a></button>
			<button class="btn button-default"><font color="#adff2f">老铁去结算吧</font></button>
		</div>
</div>

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

	<!-- end cart -->
	<script src="/static/index/js/jquery.min.js"></script>
	<script>
		//文本框失去焦点
		$(document).on("blur",".buy_number",function(){
			//获取当前失去焦点的文本框
            var _this=$(this);
            //获取购买数量
            var buy_number=_this.val();
			var reg=/^\d{1,}$/;
            //判断购买数量=空
            if(buy_number==""){
                //如果空  文本框赋值1
                _this.val(1);
            }else if(buy_number<=0){
                //小于等于0  文本框赋值1
                _this.val(1);
            }else if(!reg.test(buy_number)){
                //不符合正则  文本框赋值1
                _this.val(1);
            }else{
                _this.val(parseInt(buy_number));
            }
			//获取商品id
			var goods_id=_this.parent().attr("goods_id");
            //更改购买数据
            changeNumber(goods_id,buy_number);
            //重新获取小计
            getTotal(goods_id,_this);
			// window.location.reload();
		});
		//更改购买数据
        function changeNumber(goods_id,buy_number){
            $.ajax({
                url:"/changeNumber",
                type:"post",
                data:{goods_id:goods_id,buy_number:buy_number},
                async:false,
                dataType:'json',
                success:function(res){
                    if(res.code==2){
                        console.log(res.font);
                    }
                }
            })
        }
		//重新获取小计
        function getTotal(goods_id,_this){
            $.post(
                "/getTotal",
                {goods_id:goods_id},
                function(res){
                    _this.parents().next().children().eq(1).text("$"+res);
                }
            )
        }
		//单删
        $(document).on("click",".del",function(){
			if(window.confirm("是否确认删除？")){
            //获取当前点击的对象
            var _this=$(this);
            //获取商品id
            var goods_id=_this.parents('div').attr("good_id");
            $.post(
                "/del",
                {goods_id:goods_id},
                function(res){
                      if(res.code==1){
                          //删除成功
                          _this.parent().parent().parent().parent().remove();
                        //   //获取总价
                        //   getMoney();
                      }else{
                          //删除失败
                          alert(res.font);
                      }
                },"json"
            )
          }  
        })
	</script>
@include("index.layouts.foot")
@endsection