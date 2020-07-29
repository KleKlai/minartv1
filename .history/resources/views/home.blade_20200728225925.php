@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->


    <div>
        <div id="pattern">
                <img src="/images/spattern.png" alt="">
        </div>
        <div class="container wide">
            <div class="row">
                <div class="col-md">
                    <div class="container">
                        <div class="row row-cols-1">
                            <div class="col">
                                <img src="/images/logo.png" alt="Mindanao Art Logo">
                            </div>
                            <div class="col py-5">
                                <h2>Living Art in New Landscape</h2>
                                <countdown :time="time" :interval="100" tag="p">
                                    <template slot-scope="props">
                                        <div id="root">
                                            <h1 class="day">{{ props.days }}</h1> <p class="column">:</p>
                                            <h1 class="hour">{{ props.hours }}</h1> <p  class="column">:</p>
                                            <h1 class="minute">{{ props.minutes }}</h1> <p class="column">:</p>
                                            <h1 class="second">{{ props.seconds }}</h1>
                                            <h4 class="dayl">dd</h4>
                                            <h4 class="hourl">hh</h4>
                                            <h4 class="minutel">mm</h4>
                                            <h4 class="secondl">ss</h4>
                                        </div>
                                    </template>
                                </countdown>
                            </div>
                            <div class="col">
                                <a class="link" href="/signmeup">
                                    SIGN ME UP  
                                    <font-awesome-icon icon="angle-right" />
                                    <font-awesome-icon icon="angle-right" />
                                    <font-awesome-icon icon="angle-right" />
                                </a>
                                <p>To get up-to-date news</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <img class="picture" src="/images/image1.png" alt="Image1">
                </div>
            </div>
        </div>
        
        <div class="container small">
            <div class="row">
                <div class="col-3">
                    <div class="col">
                        <img src="/images/logo.png" alt="Mindanao Art Logo">
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div class="row row-cols-1">
                            <div class="col">
                                <h2>Living Art in New Landscape</h2>
                                <countdown :time="time" :interval="100" tag="p">
                                    <template slot-scope="props">
                                        <div id="root">
                                            <h1 class="day">{{ props.days }}</h1> <p class="column">:</p>
                                            <h1 class="hour">{{ props.hours }}</h1> <p  class="column">:</p>
                                            <h1 class="minute">{{ props.minutes }}</h1> <p class="column">:</p>
                                            <h1 class="second">{{ props.seconds }}</h1>
                                            <h4 class="dayl">dd</h4>
                                            <h4 class="hourl">hh</h4>
                                            <h4 class="minutel">mm</h4>
                                            <h4 class="secondl">ss</h4>
                                        </div>
                                    </template>
                                </countdown>
                            </div>
                            <div class="col  py-3">
                                <a class="link" href="/signmeup">
                                    SIGN ME UP  
                                    <font-awesome-icon icon="angle-right" />
                                    <font-awesome-icon icon="angle-right" />
                                    <font-awesome-icon icon="angle-right" />
                                </a>
                                <p>To get up-to-date news</p>
                            </div>
                            <div class="col">
                                <img class="picture" src="/images/image1.png" alt="Image1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <p>Copyright 2020. Mindanao Art</p>
        </div>
    </div>
@endsection
