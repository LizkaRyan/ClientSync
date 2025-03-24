@extends('template/template')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fas fa-users"></i></h3>
                                        <p class="text-muted">Total Clients</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-primary">{{$countCustomer}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <a href="/customer" class="btn btn-primary">Voir détails</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fas fa-ticket-alt"></i></h3>
                                        <p class="text-muted">Total Tickets</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-cyan">{{$countTicket}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <a href="/depense/ticket" class="btn btn-success">Voir détails</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3><i class="fas fa-pencil-alt"></i></h3>
                                        <p class="text-muted">Total Leads</p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-success">{{$countLead}}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <a href="/depense/lead" class="btn btn-warning">Voir détails</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-3">
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
