@extends('layouts.app')

@push('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>List</h5>
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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label class="font-normal">Choose school...</label>
                            <div class="row">
                            <div class="col-md-10">
                                <select data-placeholder="Choose a Country..."  name="school" class="chosen-select"  tabindex="2">
                                    <option value="School1">School1</option>
                                    <option value="School2">School2</option>
                                    <option value="School3">School3</option>

                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-sm btn-primary float-right" id="show"><strong>Show</strong></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>School(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                        @foreach($datas as $data)
                                        <tr class="gradeX">
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }} </td>
                                            <td>
                                                @foreach($data->school as $school)
                                                    {{ $school }},
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

<script>
    $(document).ready(function(){
        $('#show').click(function(){
            var result = "";
            $.ajax({
                url: '{{ route("user.getlist") }}',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    name: $('.chosen-select').val(),
                },
                dataType: 'JSON',
                success: function(res) {
                    for(var i = 0; i < res.length; i ++) {
                        result += '<tr class="gradeX"><td>' + res[i]["name"] +
                        '</td><td>' + res[i]["email"] + '</td><td>'+ res[i]["school"] +'</td></tr>';
                    }
                    $("#table").html(result);
                }
            });
        });
    });
</script>

@endpush
