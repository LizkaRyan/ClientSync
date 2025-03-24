@extends('template/template')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dashboard</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="allLeadDepense" width="400" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="allTicketDepense" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="allDepense" width="400" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="sumDepenseBudget" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <canvas id="sumDepense" width="300" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const sumDepenseBudget=<?php echo(json_encode($statistique["sumDepenseBudget"])) ?>;
        const sumDepense=<?php echo(json_encode($statistique["sumDepense"])) ?>;
        const totalDepense=<?php echo(json_encode($statistique["totalDepense"])) ?>;
        const totalLeadDepense=<?php echo(json_encode($statistique["totalLeadDepense"])) ?>;
        const totalTicketDepense=<?php echo(json_encode($statistique["totalTicketDepense"])) ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('/my-js/dashboard-sum-depense-budget.js')}}"></script>
    <script src="{{asset('/my-js/dashboard-all-depense.js')}}"></script>
    <script src="{{asset('/my-js/dashboard-ticket-depense.js')}}"></script>
    <script src="{{asset('/my-js/dashboard-lead-depense.js')}}"></script>
    <script src="{{asset('/my-js/dashboard-depense-group.js')}}"></script>
@endsection
