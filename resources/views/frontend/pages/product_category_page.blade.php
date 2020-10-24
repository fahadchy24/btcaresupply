@extends('layouts.app')

@section('title', $category->category_name) 

@section('content')
<!-- Main Container  -->
<div class="main-container product-listing container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">{{ $category->category_name }}</a></li>
    </ul>
    <div class="row">
        <!--Right Part Start -->
        <aside class="col-sm-4 col-md-3 content-aside left_column sidebar-offcanvas" id="column-left">
            <span id="close-sidebar" class="fa fa-times"></span>
            <div class="module">
                <h3 class="modtitle"><span><i class="fa fa-paste"></i>Filter Shop By</span> </h3>
                <div class="modcontent ">
                    <form class="type_2">
                        <div class="table_layout filter-shopby">
                            <div class="table_row">
                                <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
                                <div class="table_cell" style="z-index: 103;">
                                    <legend>Search</legend>
                                    <input class="form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
                                </div>
                                <!--/ .table_cell -->
                                <!-- - - - - - - - - - - - - - End of category filter - - - - - - - - - - - - - - - - -->
                                <!-- - - - - - - - - - - - - - CATEGORY - - - - - - - - - - - - - - - - -->
                                <div class="table_cell">
                                    <fieldset>
                                        <legend>Category</legend>
                                        <ul class="checkboxes_list">
                                            @foreach ($allCategory as $item)
                                            <li>
                                                <input type="checkbox" {{--  checked=""  --}} name="category" id="category_1">
                                                <label for="category_1">{{ $item->category_name }}</label>
                                            </li>
                                            @endforeach
                                        </ul>

                                    </fieldset>

                                </div>
                                <!--/ .table_cell -->
                                <!-- - - - - - - - - - - - - - End  CATEGORY - - - - - - - - - - - - - - - - -->

                                <!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
                                <div class="table_cell">
                                    <fieldset>
                                        <legend>Price</legend>
                                        <div class="range">
                                            Range :
                                            <span class="min_val">$28.00</span> -
                                            <span class="max_val">$562.00</span>
                                            <input type="hidden" name="" class="min_value" value="28.00">
                                            <input type="hidden" name="" class="max_value" value="562.00">
                                        </div>
                                        <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 3.15795%;"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" style="left: 96.8438%;"></span>
                                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 3.15795%; width: 93.6859%;"></div>
                                        </div>
                                    </fieldset>
                                </div>
                                <!--/ .table_cell -->

                                <!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

                            </div>
                            <!--/ .table_row -->
                            <div class="bottom_box">
                                <div class="buttons_row">
                                    <button type="submit" class="button_grey button_submit">Search</button>
                                    <button type="reset" class="button_grey filter_reset">Reset</button>
                                </div>

                            </div>
                        </div>
                        <!--/ .table_layout -->
                    </form>
                </div>
            </div>

            <div class="module product-simple best-seller best-seller-custom">
                <h3 class="modtitle">
                    <span><i class="fa fa-diamond fa-hidden"></i>Latest products</span>
                </h3>
                <div class="modcontent">
                    <div id="so_extra_slider_1" class="so-extraslider">
                        <!-- Begin extraslider-inner -->
                        <div class="yt-content-slider extraslider-inner">
                            <div class="item">
                                @foreach($latestproducts as $row)
                                <div class="item-wrap style1 ">
                                    <div class="item-wrap-inner" style="width: 200px;">
                                        <div class="media-left">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="{{ $row->product_name }}">
                                                        <img src="{{ $row->main_image }}" alt="Mandouille short">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="{{ url('product/view', $row->id) }}" target="_self" title="Mandouille short">{{ $row->product_name }}</a>
                                                </div>
                                                <div class="content_price price">
                                                    @if ($row->sale_price>NULL)
                                                    <span class="price-new product-price">{{ $row->sale_price }}</span>&nbsp;&nbsp;
                                                    <span class="price-old">{{ $row->regular_price }}</span>&nbsp;
                                                    @else
                                                    <span class="price-new product-price">{{ $row->regular_price }}</span>&nbsp;
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End item-info -->
                                    <!-- End item-wrap-inner -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--End extraslider-inner -->
                    </div>
                </div>
            </div>
        </aside>
        <!--Right Part End -->

        <!--Middle Part Start-->
        <div id="content" class="col-md-9 col-sm-12">
            <a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md" style="margin-bottom: 15px;"><i class="fa fa-bars"></i>Sidebar</a>
            <div class="sidebar-overlay "></div>
            <div class="products-category">
                <h3 class="title-category ">{{ $category->category_name }}</h3>
                <div class="category-derc">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="banners">
                                <div>
                                    <a href="#"><img src="{{ $category->cover_image }}" alt="img cate"><br></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Filters -->
                <div class="product-filter product-filter-top filters-panel">
                    <div class="row">
                        <div class="col-md-5 col-sm-3 col-xs-12 view-mode">

                            <div class="list-view">
                                <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" data-original-title="Grid"><i class="fa fa-th"></i></button>
                                <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                            </div>

                        </div>
                        <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                            {{--  <div class="form-group short-by">
                                <label class="control-label" for="input-sort">Sort By:</label>
                                <select id="input-sort" class="form-control" onchange="location = this.value;">
                                    <option value="" selected="selected">Default</option>
                                    <option value="">Name (A - Z)</option>
                                    <option value="">Name (Z - A)</option>
                                    <option value="">Price (Low &gt; High)</option>
                                    <option value="">Price (High &gt; Low)</option>
                                    <option value="">Rating (Highest)</option>
                                    <option value="">Rating (Lowest)</option>
                                    <option value="">Model (A - Z)</option>
                                    <option value="">Model (Z - A)</option>
                                </select>
                            </div>  --}}
                            <div class="form-group">
                                <label class="control-label" for="input-limit">Show:</label>
                                <select id="input-limit" class="form-control" onchange="location = this.value;">
                                    <option value="" selected="selected">15</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //end Filters -->
                <!--changed listings-->
                <div class="products-list row nopadding-xs so-filter-gird grid">
                    @foreach ($products as $item)
                    <div class="product-layout col-md-3"> 
                        <div class="product-item-container">
                            <div class="left-block left-b">
                                {{-- <div class="product-card__gallery product-card__left">
                                    <div class="item-img thumb-active" data-src="image/catalog/demo/product/electronic/600x600/3-1.jpg"><img src="image/catalog/demo/product/electronic/90x90/3-1.jpg" alt="image"></div>
                                    <div class="item-img" data-src="image/catalog/demo/product/electronic/600x600/3-2.jpg"><img src="image/catalog/demo/product/electronic/90x90/3-2.jpg" alt="image"></div>
                                    <div class="item-img" data-src="image/catalog/demo/product/electronic/600x600/3.jpg"><img src="image/catalog/demo/product/electronic/90x90/3.jpg" alt="image"></div>
                                </div> --}}
                                <div class="product-image-container">
                                    <a href="{{ url('/product/view/'.$item->products->id)}}" target="_self" title="Drutick lanaeger">
                                        <img src="{{ $item->products->main_image }}" class="img-1 img-responsive" alt="imageee"> 
                                    </a>
                                </div>
                            </div>
                            <div class="right-block right-b">
                                <div class="caption">
                                    <h4><a href="{{ url('/product/view/'.$item->products->id)}}" title="{{$item->products->product_name}}" target="_self">{{ \Illuminate\Support\Str::limit(strip_tags($item->products->product_name), 40)}}</a></h4>
                                    <div class="price"> <span class="price-new">{{ "$".$item->products->regular_price }}</span>
                                    </div>
                                    <div class="button-group so-quickview cartinfo--static">
                                        <form action="{{ url('cart/add')}}" method="POST" style="display:inline-flex;">@csrf
                                            <input type="hidden" name="id" value="{{ $item->products->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="addToCart" title="Add to cart"><i class="fa fa-shopping-basket"></i>
                                                <span>Add to cart </span>
                                            </button>
                                        </form>
                                        <form class="form" action="{{ route('add-to-wishlist') }}" method="POST" style="display:inline-flex;">@csrf
                                            <input type="hidden" name="id" value="{{ $item->products->id }}">
                                            <button type="submit" class="wishlist btn-button" title="Add to Wish List"><i class="fa fa-heart"></i><span></span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="description item-desc hidden">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est . </p>
                                    </div>
                                    <div class="list-block hidden">
                                        <button class="addToCart btn-button" type="button" title="Add to Cart" onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                        </button>
                                        <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                        </button>
                                        <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                        </button>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>
                                        <!--end quickview-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--// End Changed listings-->
                <!-- Filters -->
                <div class="product-filter product-filter-bottom filters-panel">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <ul class="pagination">
                                <li class="active">
                                    <span>1</span>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 text-right text-show">Showing 1 to 15 of 15 (1 Pages)</div>
                    </div>
                </div>
                <!-- //end Filters -->

            </div>

        </div>
        <!--Middle Part End-->
    </div>
    <!--Middle Part End-->
</div>
<!-- End Main Container  -->

@include('layouts.front-inc.footer')

@endsection

@push('scripts')

<script type="text/javascript">
	
	// Check if Cookie exists
	if ($.cookie('display')) { view = $.cookie('display');}
	else {view = 'grid';}
	
	if(view) display(view);
	
	function display(view) {
		$('.products-list').removeClass('list grid').addClass(view);
		$('.list-view .btn').removeClass('active');
		if(view == 'list') {
			$('.products-list .product-layout').removeClass('col-md-3').addClass('col-md-12');
			$('.list-view .' + view).addClass('active');
			$.cookie('display', 'list'); 
		}else{
			$('.products-list .product-layout').removeClass('col-md-12').addClass('col-md-3');
			$('.list-view .' + view).addClass('active');
			$.cookie('display', 'grid');
		}
	}
	
		
</script>

@endpush
