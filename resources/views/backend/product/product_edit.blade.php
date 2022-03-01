@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Product Edit</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('product.update') }}">
                    @csrf

                    <input type="hidden" value="{{$product->id}}" name="id">

                    <div class="row">
                      <div class="col-12">
                          
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="product_name" name="product_name" class="form-control" value="{{$product->product_name}}"> 
                                    </div>
                                    @error('product_name')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="product_color" name="product_color" class="form-control" value="{{$product->product_color}}"> 
                                    </div>
                                    @error('product_color')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="product_price" name="product_price" class="form-control" value="{{$product->product_price}}"> 
                                    </div>
                                    @error('product_price')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected' : '' }} >{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span>
                                            <strong style="color:red !important;">{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="product_code" name="product_code" class="form-control" value="{{$product->product_code}}"> 
                                    </div>
                                    @error('product_code')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="product_quantity" name="product_quantity" class="form-control" value="{{$product->product_quantity}}"> 
                                    </div>
                                    @error('product_quantity')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <h5>Product Description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="editor1" name="product_description">{{$product->product_description}}</textarea>
                            </div>
                            @error('product_description')
                                <span>
                                    <strong style="color:red !important;">{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <h5>Network Technology <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="net_technology" name="net_technology" class="form-control" value="{{$product->net_technology}}"> </div>
                            @error('net_technology')
                            <span>
                                <strong style="color:red !important;">{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Announced <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="launch_announced" name="launch_announced" class="form-control" value="{{$product->launch_announced}}"> </div>
                                    @error('launch_announced')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Body Dimensions <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="body_dimensions" name="body_dimensions" class="form-control" value="{{$product->body_dimensions}}"> </div>
                                    @error('body_dimensions')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Body Weight <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="body_weight" name="body_weight" class="form-control" value="{{$product->body_weight}}"> </div>
                                    @error('body_weight')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Body Build <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="body_build" name="body_build" class="form-control" value="{{$product->body_build}}"> </div>
                                    @error('body_build')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SIM <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="body_sim" name="body_sim" class="form-control" value="{{$product->body_sim}}"> </div>
                                    @error('body_sim')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Display Type <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="display_type" name="display_type" class="form-control" value="{{$product->display_type}}"> </div>
                                    @error('display_type')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Display Size <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="display_size" name="display_size" class="form-control" value="{{$product->display_size}}"> </div>
                                    @error('display_size')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Display Resolution <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="display_resolution" name="display_resolution" class="form-control" value="{{$product->display_resolution}}"> </div>
                                    @error('display_resolution')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Platform OS <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="platform_os" name="platform_os" class="form-control" value="{{$product->platform_os}}"> </div>
                                    @error('platform_os')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Platform Chipset <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="platform_chipset" name="platform_chipset" class="form-control" value="{{$product->platform_chipset}}"> </div>
                                    @error('platform_chipset')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Platform CPU <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="platform_cpu" name="platform_cpu" class="form-control" value="{{$product->platform_cpu}}"> </div>
                                    @error('platform_cpu')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Platform GPU <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="platform_gpu" name="platform_gpu" class="form-control" value="{{$product->platform_gpu}}"> </div>
                                    @error('platform_gpu')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Memory Card Slot <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="memory_card_slot" name="memory_card_slot" class="form-control" value="{{$product->memory_card_slot}}"> </div>
                                    @error('memory_card_slot')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Memory Internal <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="memory_internal" name="memory_internal" class="form-control" value="{{$product->memory_internal}}"> </div>
                                    @error('memory_internal')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="form-group">
                            <h5>Main Camera Spec <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="camera_spec" name="camera_spec" class="form-control" value="{{$product->camera_spec}}"> 
                            </div>
                            @error('camera_spec')
                            <span>
                                strong style="color:red !important;">{{$message}}</strong>
                            </span>
                             @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Main Camera Features <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="camera_features" name="camera_features" class="form-control" value="{{$product->camera_features}}"> </div>
                                    @error('camera_features')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Main Camera Video <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="camera_video" name="camera_video" class="form-control" value="{{$product->camera_video}}"> </div>
                                    @error('camera_video')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Selfie Camera Single <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="selfie_cam_single" name="selfie_cam_single" class="form-control" value="{{$product->selfie_cam_single}}"> </div>
                                    @error('selfie_cam_single')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Selfie Camera Features <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="selfie_cam_features" name="selfie_cam_features" class="form-control" value="{{$product->selfie_cam_features}}"> </div>
                                    @error('selfie_cam_features')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Selfie Camera Video <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="selfie_cam_video" name="selfie_cam_video" class="form-control" value="{{$product->selfie_cam_video}}"> </div>
                                    @error('selfie_cam_video')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Sound Loudspeaker <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="sound_loudspeaker" name="sound_loudspeaker" class="form-control" value="{{$product->sound_loudspeaker}}"> </div>
                                    @error('sound_loudspeaker')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Sound 3.5mm jack <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="sound_jack" name="sound_jack" class="form-control" value="{{$product->sound_jack}}"> </div>
                                    @error('sound_jack')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Comms WLAN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="comms_wlan" name="comms_wlan" class="form-control" value="{{$product->comms_wlan}}"> </div>
                                    @error('comms_wlan')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Comms Bluetooth <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="comms_bluetooth" name="comms_bluetooth" class="form-control" value="{{$product->comms_bluetooth}}"> </div>
                                    @error('comms_bluetooth')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Comms GPS <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="comms_gps" name="comms_gps" class="form-control" value="{{$product->comms_gps}}"> </div>
                                    @error('comms_gps')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Comms Radio <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="comms_radio" name="comms_radio" class="form-control" value="{{$product->comms_radio}}"> </div>
                                    @error('comms_radio')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Comms USB <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="comms_usb" name="comms_usb" class="form-control" value="{{$product->comms_usb}}"> </div>
                                    @error('comms_usb')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Comms NFC <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="comms_nfc" name="comms_nfc" class="form-control" value="{{$product->comms_nfc}}"> </div>
                                    @error('comms_nfc')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Battery Type <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="battery_type" name="battery_type" class="form-control" value="{{$product->battery_type}}"> </div>
                                    @error('battery_type')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Battery Charging <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="battery_charging" name="battery_charging" class="form-control" value="{{$product->battery_charging}}"> </div>
                                    @error('battery_charging')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
   
                      </div>
                    </div>
    
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-info" value="Update">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->


      <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
				  </div>
                  <form method="post" action="{{route('update.product.image')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row rom-sm">
                        @foreach($multiImgs as $img)
                        <div class="col-md-4">
                            <div class="card ml-4 mr-4 mt-2">
                                <img src="{{asset($img->photo_name)}}" class="card-img-top" style="height: 200px; width: 340px;">
                                <div class="card-body">
                                  <h5 class="card-title">
                                      <a href="{{route('product.multiimg.delete', $img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                  </h5>
                                  <p class="card-text">
                                      <div class="form-group">
                                          <label class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                          <input type="file" name="multi_img[{{ $img->id }}]" >
                                      </div>
                                  </p>
                                </div>
                              </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-xs-right ml-4 mb-4">
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                  </form> 
				</div>
			  </div>
        </div>
      </section>

      <section class="content">
        <div class="row">
            <div class="col-md-6">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Main Image <strong>Update</strong></h4>
				  </div>
                  <form method="post" action="{{route('update.product.thambnail')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="oldimage" value="{{$product->product_thambnail}}">
                    <div class="row rom-sm">
                        
                        <div class="col-md-8">
                            <div class="card ml-4 mr-4 mt-2">
                                <img src="{{asset($product->product_thambnail)}}" class="card-img-top" style="height: 200px; width: 340px;">
                                <div class="card-body">
                                  <p class="card-text">
                                      <div class="form-group">
                                          <label class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                          <input type="file" name="product_thambnail" >
                                      </div>
                                  </p>
                                </div>
                              </div>
                        </div>
                        
                    </div>
                    <div class="text-xs-right ml-4 mb-4">
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                  </form> 
				</div>
			  </div>
        </div>
      </section>






    </div>


@endsection