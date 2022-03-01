@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add Product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                          
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="product_name" name="product_name" class="form-control"> 
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
                                        <input type="text" id="product_color" name="product_color" class="form-control"> 
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
                                        <input type="text" id="product_price" name="product_price" class="form-control"> 
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
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                                        <input type="text" id="product_code" name="product_code" class="form-control"> 
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
                                        <input type="text" id="product_quantity" name="product_quantity" class="form-control" > 
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
                                <textarea id="editor1" name="product_description" ></textarea>
                            </div>
                            @error('product_description')
                                <span>
                                    <strong style="color:red !important;">{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr style="border-color: rgb(122, 122, 3);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="product_thambnail" name="product_thambnail">
                                    </div>
                                    @error('product_thambnail')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Multiple Images <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]"  multiple="">
                                    </div>
                                    @error('multi_img')
                                    <span>
                                        <strong style="color:red !important;">{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Network Technology <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" id="net_technology" name="net_technology" class="form-control"> </div>
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
                                        <input type="text" id="launch_announced" name="launch_announced" class="form-control"> </div>
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
                                        <input type="text" id="body_dimensions" name="body_dimensions" class="form-control"> </div>
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
                                        <input type="text" id="body_weight" name="body_weight" class="form-control"> </div>
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
                                        <input type="text" id="body_build" name="body_build" class="form-control"> </div>
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
                                        <input type="text" id="body_sim" name="body_sim" class="form-control"> </div>
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
                                        <input type="text" id="display_type" name="display_type" class="form-control"> </div>
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
                                        <input type="text" id="display_size" name="display_size" class="form-control"> </div>
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
                                        <input type="text" id="display_resolution" name="display_resolution" class="form-control"> </div>
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
                                        <input type="text" id="platform_os" name="platform_os" class="form-control"> </div>
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
                                        <input type="text" id="platform_chipset" name="platform_chipset" class="form-control"> </div>
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
                                        <input type="text" id="platform_cpu" name="platform_cpu" class="form-control"> </div>
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
                                        <input type="text" id="platform_gpu" name="platform_gpu" class="form-control"> </div>
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
                                        <input type="text" id="memory_card_slot" name="memory_card_slot" class="form-control"> </div>
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
                                        <input type="text" id="memory_internal" name="memory_internal" class="form-control"> </div>
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
                                <input type="text" id="camera_spec" name="camera_spec" class="form-control"> 
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
                                        <input type="text" id="camera_features" name="camera_features" class="form-control"> </div>
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
                                        <input type="text" id="camera_video" name="camera_video" class="form-control"> </div>
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
                                        <input type="text" id="selfie_cam_single" name="selfie_cam_single" class="form-control"> </div>
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
                                        <input type="text" id="selfie_cam_features" name="selfie_cam_features" class="form-control"> </div>
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
                                        <input type="text" id="selfie_cam_video" name="selfie_cam_video" class="form-control"> </div>
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
                                        <input type="text" id="sound_loudspeaker" name="sound_loudspeaker" class="form-control"> </div>
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
                                        <input type="text" id="sound_jack" name="sound_jack" class="form-control"> </div>
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
                                        <input type="text" id="comms_wlan" name="comms_wlan" class="form-control"> </div>
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
                                        <input type="text" id="comms_bluetooth" name="comms_bluetooth" class="form-control"> </div>
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
                                        <input type="text" id="comms_gps" name="comms_gps" class="form-control"> </div>
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
                                        <input type="text" id="comms_radio" name="comms_radio" class="form-control"> </div>
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
                                        <input type="text" id="comms_usb" name="comms_usb" class="form-control"> </div>
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
                                        <input type="text" id="comms_nfc" name="comms_nfc" class="form-control"> </div>
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
                                        <input type="text" id="battery_type" name="battery_type" class="form-control"> </div>
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
                                        <input type="text" id="battery_charging" name="battery_charging" class="form-control"> </div>
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
                          <input type="submit" class="btn btn-info" value="Add Product">
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
    </div>


@endsection