	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp -> name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($type_products as $value)
								<li><a href="{{route('loaisanpham',$value->id)}}">{{$value->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" style="width: 250px; height: 350px;" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp -> name}}</p>
											<p class="single-item-price">
												@if($sp -> promotion_price == 0)
					                                <span class="flash-sale">{!! $sp -> unit_price !!} đ</span>
					                            @else
					                            	<span class="flash-del">{!! $sp -> unit_price !!} đ</span>
					                            	<span class="flash-sale">{!! $sp -> promotion_price !!} đ</span>
					                            @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('AddtoCart',$value->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products - Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $sp_khac)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp_khac->id)}}"><img src="source/image/product/{{$sp_khac->image}}" style="width: 250px; height: 350px;" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_khac -> name}}</p>
											<p class="single-item-price">
												@if($sp_khac -> promotion_price == 0)
					                                <span class="flash-sale">{!! $sp_khac -> unit_price !!} đ</span>
					                            @else
					                            	<span class="flash-del">{!! $sp_khac -> unit_price !!} đ</span>
					                            	<span class="flash-sale">{!! $sp_khac -> promotion_price !!} đ</span>
					                            @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('AddtoCart',$value->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_khac->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection