@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-12'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            @foreach($multiImage as $image)
            <div class="single-product-gallery-item" id="slide{{$image->id}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($image->photo_name)}}">
                    <img class="img-responsive" alt="" src="{{asset($image->photo_name)}}" data-echo="{{asset($image->photo_name)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
            @endforeach
        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">
            <div id="owl-single-product-thumbnails">
                @foreach($multiImage as $image)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$image->id}}">
                        <img class="img-responsive" width="85" alt="" src="{{asset($image->photo_name)}}" data-echo="{{asset($image->photo_name)}}" />
                    </a>
                </div>
                @endforeach
            </div><!-- /#owl-single-product-thumbnails -->
        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name" id="pname">{{ $product->product_name }}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(13 Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{!! $product->product_description !!}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">{{ $product->product_price }} €</span>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="info-title control-label">Choose Color </label>
                                    <select class="form-control unicase-form-control selectpicker" style="display: none;" id="color">
                                        <option selected="" disabled="">--Choose Color--</option>
                                        @foreach($product_color as $color)
                                        <option value="{{$color}}">{{ucwords($color)}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Quantity :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="form-group">
                                                <input type="number" class="form-control" id="quantity" value="1" min="1">
                                            </div>
							            </div>
									</div>

                                    <input type="hidden" id="product_id" value="{{$product->id}}" min="1">
									<div class="col-sm-7">
										<button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
                

			</div><!-- /.col -->
			
		</div><!-- /.row -->

        <div class="row" style="margin-top:4rem; margin-bottom:4rem;">
            <div class="col-md-12">
                <div class="product-comparison">
                    <h3>Product Details</h3>
                    <hr>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;"><h4>NETWORK</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Technology: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->net_technology }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;"><h4>LAUNCH</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Announced: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->launch_announced }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="4"><h4>BODY</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Dimensions: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->body_dimensions }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Weight: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->body_weight }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Build: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->body_build }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>SIM: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->body_sim }}</td>
                        </tr> 
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="3"><h4>DISPLAY</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Type: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->display_type }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Size: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->display_size }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Resolution: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->display_resolution }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="4"><h4>PLATFORM</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>OS: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->platform_os }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Chipset: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->platform_chipset }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>CPU: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->platform_cpu }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>GPU: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->platform_gpu }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="2"><h4>MEMORY</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Card slot: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->memory_card_slot }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Internal: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->memory_internal }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="3"><h4>MAIN CAMERA</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Spec: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->camera_spec }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Features: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->camera_features }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Video: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->camera_video }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="3"><h4>SELFIE CAMERA</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Spec: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->selfie_cam_single }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Features: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->selfie_cam_features }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Video: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->selfie_cam_video }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="2"><h4>SOUND</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Loudspeaker: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->sound_loudspeaker }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>3.5mm jack: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->sound_jack }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="6"><h4>COMMS</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>WLAN: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->comms_wlan }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Bluetooth: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->comms_bluetooth }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px !important; width: 15%;"><strong>GPS: </strong></td>
                            <td style="padding: 8px !important;">{{ $product->comms_gps }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px !important; width: 15%;"><strong>NFC: </strong></td>
                            <td style="padding: 8px !important;">{{ $product->comms_nfc }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px !important; width: 15%;"><strong>Radio: </strong></td>
                            <td style="padding: 8px !important;">{{ $product->comms_radio }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px !important; width: 15%;"><strong>USB: </strong></td>
                            <td style="padding: 8px !important;">{{ $product->comms_usb }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table-responsive table table-bordered">
                        <tbody>
                        <tr>
                        <th style="color: red; width: 15%;" rowspan="2"><h4>BATTERY</h4></th>
                        <td style="padding: 8px !important; width: 15%;"><strong>Type: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->battery_type }}</td>
                        </tr>
                        <tr>
                        <td style="padding: 8px !important; width: 15%;"><strong>Charging: </strong></td>
                        <td style="padding: 8px !important;">{{ $product->battery_charging }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>







</div><!-- /.container -->
</div><!-- /.body-content -->



@endsection