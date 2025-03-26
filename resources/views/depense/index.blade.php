@extends('template/template')
@section('title','List depenses')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Depenses</h4>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Customer</th>
                                <th>Cause</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($depenses as $depense)
                            <tr>
                                <td>{{$depense["idDepense"]}}</td>
                                <td>{{$depense["amount"]}}</td>
                                <td>{{$depense["customerName"]}}</td>
                                <td>{{$depense["cause"]}}</td>
                                <td><a class="btn btn-primary" href="/depense/update/{{$depense["idDepense"]}}/{{$depense["amount"]}}"><i class="fas fa-edit"></i></a></td>
                                <td><a class="btn btn-primary" href="/depense/delete/{{$depense["idDepense"]}}"><i class="mdi mdi-delete"></i></a></td>
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
