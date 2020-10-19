@extends('masters.frontmaster')
@section('title', __('Privacy Statement'))
@section('main')

 
        <!-- Content -->
<section class="ask-forum-sec" style="background-color: white;">
    <div id="content" class="container">
        @foreach($disclaimer as $value)
    <h1><label>{{ $value->title }}</label></h1>
           <p><?php echo $value->disclaimer; ?></p>
        @endforeach
    </div>
</section>
 <!-- <section class="terms-icons-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="terms-icons-list m-hidden">
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-1.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-2.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-3.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-4.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-box">
                                        <img src="images/terms-icon-5.png" />
                                        <h4>Come See Us</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="mobile-terms-icon m-visible desk-hidden">
                                <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-fade" data-ride="carousel">

                                    <div class="controls-top">
                                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                        <a class="btn-floating right" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-1.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-2.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-3.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-4.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="terms-icons-list">
                                                        <div class="icon-box center">
                                                            <img src="images/terms-icon-5.png" />
                                                            <h4>Come See Us</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section> -->

        <!-- Content END -->
@endsection