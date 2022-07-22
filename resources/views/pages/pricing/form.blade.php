@extends('layouts.base.app')

@section('content')
<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{ $title }} Forms</h3>
                </div>
                {{-- {{ dd($) }} --}}
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Services Forms</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h4 class="card-title" id="basic-layout-colored-form-control">Form with Bordered Controls</h4> --}}
                                    <a class="heading-elements-toggle">
                                        <i class="la la-ellipsis-v font-medium-3"></i>
                                    </a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a data-action="collapse">
                                                    <i class="ft-minus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="reload">
                                                    <i class="ft-rotate-cw"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="expand">
                                                    <i class="ft-maximize"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="close">
                                                    <i class="ft-x"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        {{-- <div class="card-text">
                                            <p>You can always change the border color of the form controls using
                                                <code>border-*</code> class.</p>
                                        </div> --}}

                                        @if (@$data->id)
                                        <form class="form" action="{{ url('pricing/'. @$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            <input type="hidden" value="{{ @$data->id }}" name="pricing_id">
                                        @else
                                        <form class="form" method="POST" action="{{ url('pricing/store') }}" enctype="multipart/form-data">
                                        @endif
                                            @csrf
                                            <div class="form-body">

                                                <h4 class="form-section">
                                                    <i class="ft-briefcase"></i>{{ $title }} Forms</h4>
                                                <div class="form-group">
                                                    <label for="contactinput5">Package Name</label>
                                                    <input class="form-control border-primary" type="text" value="{{ @$data->package_name }}" name="package_name" placeholder="Title" id="contactinput5">
                                                </div>

                                                <div class="form-group">
                                                    <label for="contactinput5">Package Description</label>
                                                    <textarea class="form-control border-primary" id="" ba name="package_description" cols="30" rows="10">{{ @$data->package_description }}</textarea>
                                                    {{-- <input class="form-control border-primary" type="email" placeholder="Email" id="contactemail5"> --}}
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="contactinput5">Price</label>
                                                    <input class="form-control border-primary" type="number" value="{{ @$data->package_price }}" name="price" placeholder="Title" id="contactinput5">
                                                </div>
                                                <div class="d-flex justify-content-center">

                                                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                </div>
                                                <div id="newRow">

                                                    @if (@$data->detailPricing)
                                                        @foreach (@$data->detailPricing as $key => $value)

                                                        <div id="form-group">
                                                            <div class="input-group mb-1 mt-1">
                                                                <input type="text" name="description[]" class="form-control m-input" placeholder="Package Detail Description" value="{{ $value->description }}" autocomplete="off">
                                                                <div class="input-group-append">
                                                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @endif
                                                    
                                                
                                            </div>
                                            
                                            <div class="form-actions right">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // add row
        $("#addRow").on('click',function () {
            // console.log('add row');
            var html = '';
            html += '<div id="form-group">';
            html += '<div class="input-group mb-1 mt-1">';
            html += '<input type="text" name="description[]" class="form-control m-input" placeholder="Package Detail Description" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            // console.log($(this));
            $(this).closest('#form-group').remove();
        });
    </script>
@endsection