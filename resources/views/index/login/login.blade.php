@extends('index.layouts.layout')
@section('content')

<!-- login -->
<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>LOGIN</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12" method="post" action="/login/logindo">
						<div class="input-field">
							<input type="text" class="validate" name='name' placeholder="请输入用户名" required>
						</div>
						<div class="input-field">
							<input type="password" class="validate" placeholder="请输入密码" required name="password">
						</div>
						<a href=""><h6>Forgot Password ?</h6></a>
						<a href="/login/reg"><h3>还没账号吗？点这里</h3></a>
                        <input type="submit" value="LOGIN" class="btn button-default">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->


@endsection