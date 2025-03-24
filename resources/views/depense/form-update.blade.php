@extends('template/template')
@section('title','Update amount')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update amount</h4>
                <form action="/depense/update" method="post">
                    @csrf

                    <label class="m-t-20" for="name">Amount:</label>
                    <div class="input-group">
                        <input type="number" id="name" value="{{$amount}}" name="amount" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-20">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
