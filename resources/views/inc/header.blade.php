 @if(!Auth::guest())
<div class="header-section">
	<!-- top_bg -->
	<div class="top_bg">

		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#!">help</a></li>
					<li><a href="#!">Contact</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2>
					<a href="{{ asset('users/')}}/{{ Auth::id() }}"><i
						class="fa fa-user"></i>{{ Auth::user()->email }}</a>
				</h2>
				<h2>
					<a  href="{{ route('logout') }}">Logout </a>
				</h2>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
	<div class="clearfix"></div>
	<!-- /top_bg -->
</div>
<div class="header_bg">

	<div class="header">
		<div class="head-t">
			<div class="logo">
				<a href="{{ asset('/') }}"><h1>E-commerce</h1> </a>
				<h6>Big Store Management</h6>
			</div>
			<!-- start header_right -->
			<div class="header_right">
				<div class="rgt-bottom">
					<div class="log">
						<div class="login">
							<div id="loginContainer"></div>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="search">
					<form>
						<input type="text" value="" placeholder="search..."> <input
							type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

</div>
@endif
