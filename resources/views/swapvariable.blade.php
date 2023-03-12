@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Swap Variable</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Swap Variable</h3>
                        {{-- <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <?php
                            $a = 5;
                            $b = 3;

                            // echo "Variable awal A = " . $a . "<br/>";
                            // echo "Variable awal B = " . $b. "<br/>";

                            $a -= $b;
                            $b += $a;
                            $a = $b - $a;

                            // echo "=====================" . "<br/>";
                            // echo "Variable A = " . $a . "<br/>";
                            // echo "Variable B = " . $b;
                        ?>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Variable Awal A : 5</th>
                                    <th>Variable Awal B : 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Variable Akhir A : {{ $a }}</td>
                                    <td>Variable Akhir B : {{ $b }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@endsection
