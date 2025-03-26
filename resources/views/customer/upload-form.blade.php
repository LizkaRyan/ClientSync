@extends('template/template')
@section('title','Update amount')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update amount</h4>
                <form action="/customer/upload" method="post" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <label class="m-t-20" for="name">Upload:</label>
                    <div class="input-group">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-20">upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
