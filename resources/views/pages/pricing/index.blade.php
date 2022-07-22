@extends('layouts.base.app')

@section('content')
{{-- {{ dd($data) }} --}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{ $title }} DataTable</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">{{ $title }} DataTable
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Base style table -->
                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List Data</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <a href="{{ url('pricing/create') }}">
                                            <button class="btn btn-info">Add {{ $title }}</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        {{-- <p class="card-text">The DataTables default style file has a number of features which can be enabled based on the class name of the table. These features are.</p> --}}
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered base-style text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Package Name</th>
                                                        <th>Package Description</th>
                                                        <th>Package Price</th>
                                                        <td width="100">Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item=>$key)
                                                    <tr>
                                                        <td>{{ $item+1 }}</td>
                                                        <td>{{ $key->package_name }}</td>
                                                        <td>{{ $key->package_description }}</td>
                                                        <td>Rp. {{ number_format($key->package_price, '0') }}</td>
                                                        <td>
                                                            <a href="{{ url("pricing/".$key->id) }}" class="btn btn-sm btn-warning">
                                                                <i class="ft-edit"></i>
                                                            </a>
                                                            <button class="btn btn-sm btn-danger delete" data-id="{{ $key->id }}">
                                                                <i class="ft-trash-2"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Package Name</th>
                                                        <th>Package Description</th>
                                                        <th>Package Price</th>
                                                        <td>Action</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Base style table -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete').on('click', function(){
            let id = $(this).attr('data-id')
            // console.log(id)
            $.ajax({
                url: `{{ url('pricing/`+id+`/delete') }}`,
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "DELETE"
                },
                success: function(data){
                    console.log(data)
                    if (data.status == true) {
                        swal("Great !", data.message, "success");
                        setTimeout(() => {
                            location.reload()
                        }, 1500);
                    }
                

                }
            })
        })
    </script>
@endsection