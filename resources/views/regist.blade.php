@extends('master.tamplete')

@section('content')
<div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4  align-self-center">
          <div class="section-heading">
            <h6>Don't Miss Out!</h6>
            <h2>Unlock Your Potential Today</h2>
            <div class="special-offer">
                <span class="offer"><em>50% OFF</em></span>
                <h6>Validity: <em>Until April 24, 2036</em></h6>
                <h4>Register Now and Get <em>50% OFF!</em></h4>
                <a href="{{ route('users') }}"><i class="fas fa-home-alt"></i> Register Now</a>
            </div>
        </div>

        </div>
        <div class="col-lg-8">
          <div class="contact-us-content">
            <form id="contact-form" class="user" action="{{ route('regists') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="text" name="namas" id="name" placeholder="Your Name..." autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="text" name="kursus" id="name" readonly value="{{$course->course_name}}" placeholder="Your Name..." autocomplete="on" >
                    </fieldset>
                  </div>
                  <div class="col-lg-12 d-none">
                    <fieldset>
                      <input name="kursus_id" id="name" readonly value="{{ $course->id }}" placeholder="Your Name..." autocomplete="on" >
                    </fieldset>
                  </div>
                  <div class="col-lg-12 d-none">
                    <fieldset>
                      <input name="user_id" id="name" readonly value="{{ Auth::user()->id }}" placeholder="Your Name..." autocomplete="on" >
                    </fieldset>
                  </div>
                  <div class="col-lg-12 d-none">
                    <fieldset>
                      <input name="tgl_beli" id="tgl_beli" readonly value="{{date('Y-m-d')}}" placeholder="Tanggal Pembelian..." autocomplete="off">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="text" readonly value="Rp.{{$course->cost}}.000,-" placeholder="" autocomplete="on" >
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit"  class="orange-button">Order Now</button>
                    </fieldset>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
