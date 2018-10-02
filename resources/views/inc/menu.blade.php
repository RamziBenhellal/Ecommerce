
<div class="sidebar-menu">
	<header class="logo1">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span>
		</a>
	</header>
	<div style="border-top: 1px ridge rgba(255, 255, 255, 0.15)"></div>
	<div class="menu" data-spy="scroll">
		<ul id="menu">
			<li><a href="{{asset('/')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
			<li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span>DB
						Management</span> <span class="fa fa-angle-right"
					style="float: right"></span></a>
				<ul id="menu-academico-sub">
					<li id="menu-academico-avaliacoes"><a
						href="{{asset('/product_categories')}}">Categories</a></li>
					<li id="menu-academico-avaliacoes"><a href="{{asset('/sizes')}}">Sizes</a></li>
					<li id="menu-academico-boletim"><a href="{{asset('/colours')}}">Colours</a></li>
					<li id="menu-academico-boletim"><a
						href="{{asset('/transporters')}}">Transporters</a></li>
				</ul></li>
			<li id="menu-academico"><a href="{{asset('/products')}}"><i
					class="fa fa-file-text-o"></i> <span>All Products</span></a></li>
			@if(!empty($data['categories'])) @foreach($data['categories'] as
			$category)
			<li id="menu-academico"><a
				href="{{asset('category')}}/{{ $category->idCategory }}"><i
					class="lnr lnr-layers"></i> <span>{{$category->name}}</span> <span
					class="fa fa-angle-right" style="float: right"></span></a>
				@if(!empty($data['subcategories']))
				<ul id="menu-academico-sub" data-spy="scroll">
					@foreach($data['subcategories'] as $subcategory)
					@if($subcategory->idParent == $category->idCategory)
					<li id="menu-academico-avaliacoes"><a
						href="{{asset('category')}}/{{ $subcategory->idCategory }}">{{$subcategory->name}}</a></li>
					@endif @endforeach
				</ul> @endif</li> @endforeach @endif
			<li><a href="{{asset('/users')}}"><i class="lnr lnr-pencil"></i> <span>Users</span></a></li>
			<li id="menu-academico"><a href="{{asset('/clients')}}"><i
					class="fa fa-file-text-o"></i> <span>Client</span></a></li>
			<li id="menu-academico"><a href="{{asset('/orders')}}"><i
					class="lnr lnr-book"></i> <span>Orders</span></a></li>
			<li><a href="{{asset('/transaction')}}"><i class="lnr lnr-envelope"></i>
					<span>Transactions</span></a></li>
		</ul>
	</div>
</div>