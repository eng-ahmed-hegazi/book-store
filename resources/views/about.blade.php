@extends('front')
@section('content')
    <div class="row" style="margin: 80px 0">
        <div class="row ">
            <h4 class="text-white">ما هو موقع مخزن الكتب ؟</h4>
            <div class="col-lg-2 pull-right">
                <img src="{{asset('logo.png')}}" alt="" width="300" class="img-responsive">
            </div>
            <div class="col-lg-7 pull-right">
                <p style="padding: 20px 0;text-wrap: none">

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cum doloremque dolores error et
                    impedit necessitatibus quaerat, quis reiciendis ullam! Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Culpa cum doloremque dolores error et impedit necessitatibus quaerat, quis
                    reiciendis ullam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cum doloremque
                    dolores error et impedit necessitatibus quaerat, quis reiciendis ullam! Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Culpa cum doloremque dolores error et impedit necessitatibus.
                </p>
            </div>

        </div>
        <div class="col-lg-9 pull-right">
            <div class="panel-group" id="accordion" >
                <div class="panel panel-default" style="padding: 20px;margin-bottom:30px;background: #3d5a6a">
                    <div class="panel-heading" style="background: #3d5a6a">
                        <h6 class="panel-title" style="border: 0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="text-white" style="color: #fff">
                                كيف تصبح عضو فى موقع مخزن الكتب ؟
                            </a>
                        </h6>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse ">
                        <div class="panel-body" style="color: #ddd">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" style="padding: 20px;margin-bottom:30px;background: #3d5a6a">
                    <div class="panel-heading" style="background: #3d5a6a">
                        <h6 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="text-white" style="color: #fff">
                                ما هى سياسة الخصوصية للموقع ؟
                            </a>
                        </h6>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body"  style="color: #ddd">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    </div>
                </div>
                <div class="panel panel-default" style="padding: 20px;margin-bottom:30px;background: #3d5a6a">
                    <div class="panel-heading" style="background: #3d5a6a">
                        <h6 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="text-white" style="color: #fff">
                                لماذا لا يتم وضع الكتاب الذى طلبته
                            </a>
                        </h6>
                    </div>
                    <div id="collapse3" class="card-collapse collapse">
                        <div class="panel-body"  style="color: #ddd">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    </div>
                </div>

                <div class="panel panel-default" style="padding: 20px;margin-bottom:30px;background: #3d5a6a">
                    <div class="panel-heading" style="background: #3d5a6a">
                        <h6 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="text-white" style="color: #fff">
                                عن المطــــــــــــــور
                            </a>
                        </h6>
                    </div>
                    <div id="collapse4" class="card-collapse collapse">
                        <div class="row" style="padding: 35px 0">
                            <div class="col-lg-10 pull-right">
                                <div class="row" style="padding: 25px 0;">
                                    <div class="col-lg-4 pull-left">
                                        <img src="{{asset('img/3.png')}}" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-lg-8 pull-left">
                                        <h2 style="color: #fff">أحمد حجازى</h2>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-user mr-3" style="color: #ddd"></span>
                                             الاسم : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">أحمد محمد عبد السميع حجازى</span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-envelope mr-3" style="color: #ddd"></span>
                                            الايميل : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">ahmeedhegazy214@gmail.com</span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-phone-square mr-3" style="color: #ddd"></span>
                                            تليفون : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">(+20) 01117835451</span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-map-marker mr-3" style="color: #ddd"></span>
                                            العنوان : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">مصر / سوهاج / جهينة</span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-facebook mr-3" style="color: #ddd"></span>
                                            فيسبوك : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">
                            <a href="https://www.facebook.com" class="text-white" style="color: #fff;">https://www.facebook.com</a></span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-github mr-3" style="color: #ddd"></span>
                                            جت هب : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">
                            <a href="https://www.github.com" class="text-white" style="color: #fff;">https://www.github.com</a>
                        </span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-linkedin mr-3" style="color: #ddd"></span>
                                            لينكد ان : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">
                            <a href="https://www.linkedin.com" class="text-white" style="color: #fff;">https://www.linkedin.com</a>
                        </span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-behance mr-3" style="color: #ddd"></span>
                                            بيهانس : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">
                            <a href="https://www.behance.com" class="text-white" style="color: #fff;">https://www.behance.com</a>
                        </span>
                                        </h6>
                                        <h6 class="text-white" style="color: #ddd">
                                            <span class="fa fa-globe mr-3" style="color: #ddd"></span>
                                            بورتوفوليو : <span style="font-size: 17px;color:#fff;text-transform: capitalize" class="mr-4">
                            <a href="https://www.ahmeddesign.com" class="text-white" style="color: #fff;">https://www.ahmeddesign.com</a>
                        </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection