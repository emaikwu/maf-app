@extends('layouts.app')

@php
  $page_title = "Contact Us";
  $title = "Contact us";
@endphp

@section("content")
  @include('includes.page-title')

<div class="content-wrapper">
  <div class="contact">
    <div class="container-fluid">
      <div class="row">
        @if($settings)
          @foreach($settings as $setting)
            <div class="col-md-6">
              <div class="intro">
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et distinctio eaque nobis recusandae, accusamus harum iste tempora incidunt earum. Numquam error architecto unde sint quas tempore suscipit, animi delectus aut.</h2>
              </div>
              <div class="contact-item address">
                <h3>Address</h3>
                <p>{{$setting->address}}</p>
              </div>
              <div class="contact-item phone">
                <h3>Phone</h3>
                <p>{{$setting->phone_1}}</p>
                <p>{{$setting->phone_2}}</p>
              </div>
              <div class="contact-item social-media">
                <h3>On social media</h3>
                <ul>
                  @if($setting->facebook)
                  <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  @endif
                  @if($setting->twitter)
                  <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  @endif
                  @if($setting->instagram)
                  <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  @endif
                </ul>
                <div class="whatsapp">
                  @if($setting->whatsapp)
                  <span class="w-logo"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
                  <span class="w-num">{{$setting->whatsapp}}</span>
                </div>
                @endif
              </div>
              <div class="contact-item email">
                <h3>Via Email</h3>
                @if($setting->email_1)
                  <p>{{$setting->email_1}}</p>
                @endif
                @if($setting->email_2)
                  <p>{{$setting->email_2}}</p>
                @endif
              </div>
              <div class="contact-item contact-form">
                <h3>We'd like to hear from you</h3>
                <div class="">
                  <form action="{{route("feedback")}}" method="POST">
                    @csrf
                    <div class="medium-12 cell">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name">
                    </div>
                    <div class="medium-12 cell">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email">
                    </div>
                    <div class="medium-12 cell">
                      <label for="message">Message</label>
                      <textarea name="message" id="message" cols="30" rows="5"></textarea>
                    </div>
                    <button class="send-btn">Send</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="map">
                <div class='location-map'>
                  <iframe title="location map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.1763882027127!2d3.467996034609397!3d6.431857543721722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5ae67116e3d%3A0xb49a408dbbdcfd5!2sPENNY+MALL!5e0!3m2!1sen!2sng!4v1550250526319" width="100%" frameBorder="0" allowFullScreen></iframe>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>

@endsection