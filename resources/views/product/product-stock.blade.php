@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary product-stock" data-id="2">Product Stock</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $(() => {
            $('.product-stock').on('click', function (e) {
                e.stopPropagation();
                e.preventDefault();
                var $el = $(this);
                var id = $el.attr('data-id');
                postdata(id)
            })

            function postdata(id) {
                obj = {}
                obj['bank_id'] = id;

                $.ajax({
                    url: "http://149.129.221.143/kanaldata/Webservice/bank_account",
                    data: obj,
                    method: 'POST',
                    success: function (result) {
                        console.log('success', result);
                    }
                }).fail(function data() {
                    console.log(data);
                })
            }
        })
</script>
@endsection
