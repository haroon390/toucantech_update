@extends('layouts.app')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>User Create</h2>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>User Create </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form role="form" action="{{ route('user.store') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Enter name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email (Must Be Unique)</label>
                                    <input type="email" name="email" placeholder="Enter email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="font-normal">School</label>
                                <div>
                                <select data-placeholder="Choose the Schools..." name="school[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                                    <option value="School1">School1</option>
                                    <option value="School2">School2</option>
                                    <option value="School3">School3</option>

                                </select>
                                <div class="form-group row mt-3">
                                    <div class="col-lg-12">
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Create</strong></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        $('.chosen-select').chosen({width: "100%"});
    })
</script>

@endpush
