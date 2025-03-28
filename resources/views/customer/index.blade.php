@extends('template/template')
@section('title','List Customer')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customers</h4>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Voir dépenses</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer["customerId"]}}</td>
                                <td>{{$customer["name"]}}</td>
                                <td>{{$customer["address"]}}</td>
                                <td>{{$customer["city"]}}</td>
                                <td>{{$customer["state"]}}</td>
                                <td>{{$customer["country"]}}</td>
                                <td><a href="/depense/{{$customer["customerId"]}}">Voir dépenses</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
