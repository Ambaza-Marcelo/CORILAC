
@extends('backend.layouts.master')

@section('title')
@lang('messages.dashboard') - @lang('messages.admin_panel')
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@lang('messages.dashboard')</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{url('/404/muradutunge/ivyomwasavye-ntibishoboye-kuboneka')}}">@lang('messages.home')</a></li>
                    <li><span>@lang('messages.dashboard')</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<div class="main-content-inner">
    <br>
        <div class="row">
            <div class="col-md-6 mb-3 mb-lg-0">
                <div class="card">
                    <div class="seo-fact sbg6">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><span><i class="fa fa-qrcode" aria-hidden="false"></i></span>@lang('')</div>
                                <h2>{!! QrCode::size(50)->backgroundColor(255,255,255)->generate('ICT' ) !!}
                                </h2>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3 mb-lg-0">
                <div class="card">
                    <div class="seo-fact sbg8">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><span><i class="fa fa-qrcode" aria-hidden="false"></i></span>@lang('')</div>
                                <h2>{!! QrCode::size(50)->backgroundColor(255,255,255)->generate('ICT' ) !!}
                                </h2>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="canvas" height="200" width="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
</div>

  <!-- ambaza marcellin -pink -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = <?php echo $month; ?>;
    var machine = <?php echo "facture"; ?>;
    var barChartData = {
        labels: month,
        datasets: [{
            label: 'Factures',
            backgroundColor: "pink",
            data: machine
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Le nombre de factures envoyé ou non à l\'OBR'
                }
            }
        });
    };
</script>
@endsection