<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->string('product_color');
            $table->string('product_price');
            $table->string('product_thambnail');
            $table->integer('status')->default(0);
            $table->string('net_technology')->nullable();
            $table->string('launch_announced')->nullable();
            $table->string('body_dimensions')->nullable();
            $table->string('body_weight');
            $table->string('body_build');
            $table->string('body_sim');
            $table->string('display_type');
            $table->string('display_size');
            $table->string('display_resolution');
            $table->string('platform_os');
            $table->string('platform_chipset')->nullable();
            $table->string('platform_cpu');
            $table->string('platform_gpu');
            $table->string('memory_card_slot');
            $table->string('memory_internal');
            $table->string('camera_spec');
            $table->string('camera_features')->nullable();
            $table->string('camera_video');
            $table->string('selfie_cam_single');
            $table->string('selfie_cam_features')->nullable();
            $table->string('selfie_cam_video');
            $table->string('sound_loudspeaker');
            $table->string('sound_jack');
            $table->string('comms_wlan');
            $table->string('comms_bluetooth');
            $table->string('comms_gps');
            $table->string('comms_radio');
            $table->string('comms_usb');
            $table->string('comms_nfc');
            $table->string('battery_type');
            $table->string('battery_charging');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
