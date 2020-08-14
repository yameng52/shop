@extends('index.layouts.layout')
@section('content')


	<!-- product -->
	<div class="section product product-list">
		<div class="container">
			<div class="pages-head">
				<h3>商品列表</h3>
			</div>
			<div class="input-field">
				<select>
					<option value="">请选择</option>
                    @foreach ($data as $v)
					<option class="cate" value="{{$v['cate_id']}}">{{$v['cate_name']}}</option>
					@endforeach
				</select>
			</div>

            
			<div class="row" id="abc">
            @foreach($res as $v)
				<div class="col s6">
					<div class="content">
						<a href="/details/{{$v['goods_id']}}">	<img src="{{$v['goods_img']}}" alt=""></a>
						<h6><a href="/details">{{$v['goods_name']}}</a></h6>
						<div class="price">
                            ${{$v['goods_price']}}
						</div>
						<button class="btn button-default">添加购物车</button>
					</div>
				</div>
            @endforeach
			</div>
	
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
	</div>
	<!-- end product -->

	
	<!-- loader -->
	<div id="fakeLoader"></div>

	<!-- scripts -->
	<script src="/static/index/js/jquery.min.js"></script>
	<script src="/static/index/js/materialize.min.js"></script>
	<script src="/static/index/js/owl.carousel.min.js"></script>
	<script src="/static/index/js/fakeLoader.min.js"></script>
	<script src="/static/index/js/animatedModal.min.js"></script>
	<script src="/static/index/js/main.js"></script>

</body>
</html>
	@include("index.layouts.foot")
@endsection
<!-- <script>
    var vm = new Vue({
        el: '#abc',
        data: {
            site:null,
        },
        delimiters:["<{","}>"],
        mounted(){
            var url='/dell';
            axios.get(url).then(function(res){
                vm.site=res.data;
            })
        }

    })
</script> -->