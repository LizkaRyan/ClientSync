@extends('template/template')
@section('title','Update amount')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5"></div>
                    <h4 class="card-title">Attention seuil dépassée!</h4>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">La dépense que vous allez effectuer dépasse le taux de seuil écrite par le manager. Voulez vous vraiment poursuivre votre requête?</div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a style="display: flex;justify-content: center" href="/depense/confirm/update" class="btn btn-success">Confirmer</a>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        <a style="display: flex;justify-content: center" href="/depense/reject/update" class="btn btn-danger">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
