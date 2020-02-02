@extends('layouts.landing')

@section('meta')
    <title> خونه پز - سرویس سفارش غذای خانگی </title>
    <meta name="keywords" content="خونه پز, رزرو غذا کرمانشاه, غذای خانگی, سفارش غذا">
    <meta name="description" content="خونه پز - سرویس سفارش غذای خانگی">
@endsection

@section('content')

    @include('includes.landing_slides', ['home_page'=>true])

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
    			<div class="info">
    				<div class="row no-gutters">
    					<div class="col-sm-5 d-flex ftco-animate">
    						<div class="icon"><span class="material-icons">phone</span></div>
    						<div class="text">
                                <h3> <a href="javascript:void"> شماره تماس پشتیبانی </a> </h3>
    							@foreach ($website->phones_list() as $phone)
                                    <p dir="ltr"> <a href="tel:{{$phone}}" class="text-gray font-weight-bold"> {{pretty_phone($phone)}} </a> </p>
                                @endforeach
    						</div>
    					</div>
    					<div class="col-sm-7 d-flex ftco-animate">
    						<div class="icon"><span class="material-icons">my_location</span></div>
    						<div class="text">
    							<h3> <a href="javascript:void"> آدرس دفتر مرکزی </a> </h3>
    							<p>{{$website->address}}</p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="book p-4">
    				<h3 class="text-center"> جستجو در محصولات و غذا ها </h3>
    				<form action="{{route('search')}}" class="appointment-form">
    					<div class="d-flex justify-content-center">
    						<div class="form-group w-75">
    							<input type="text" name="f" class="form-control" placeholder="عبارت مورد نظر">
    						</div>
    					</div>
    					<div class="d-flex justify-content-center">
    						<div class="form-group w-50">
    							<input type="submit" value="جستجو" class="btn btn-white py-3 px-4">
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </section>


    @include('landing.index_sections.order_food')

    @include('landing.index_sections.cols')

    @include('landing.index_sections.products')

    @include('landing.index_sections.testimonial')

    @include('landing.index_sections.blogs')

    @include('landing.index_sections.statics')

    @include('landing.index_sections.about')


    <section class="ftco-appointment">
    	<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-12 d-flex align-self-stretch">
    				<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2692.2537373597593!2d47.056201136305184!3d34.31323392847227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ffaee741488d481%3A0x328a8f04799f6230!2sSina%20Hotel!5e0!3m2!1sen!2s!4v1578678558051!5m2!1sen!2s" frameborder="0" allowfullscreen="true"></iframe>
    			</div>
    		</div>
    	</div>
    </section>
@endsection
