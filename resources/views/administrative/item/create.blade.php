@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')
    @include('administrative.includes.breadcrumb')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">item Create</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('administrative.item')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="server"></i>
                item
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">item Create</h6>
                    <form class="forms-sample" action="{{route('administrative.item.store')}} " method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                                    <label for="title"> Title</label>
                                    <input required type="text" class="form-control form-control-danger" id="title"
                                           name="title" autocomplete="off" placeholder="Title"
                                           value="{{ old('title', isset($data) ? $data->title : '') }}"
                                           aria-invalid="true">
                                    @if($errors->has('title'))
                                        <label id="title-error" class="error mt-2 text-danger" for="title">Title
                                            Required</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('image') ? 'has-danger' : '' }}">
                                    <label for="image"> Image upload</label>
                                    <input type="file" id="image" name="image"
                                           class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                               placeholder="Upload">
                                        <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                            type="button">Upload</button>
                                    </span>
                                    </div>
                                    @if($errors->has('image'))
                                        <label id="name-error" class="error mt-2 text-danger"
                                               for="name"> {{ $errors->first('image') }}
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('color') ? 'has-danger' : '' }}">
                                    <label for="color"> Color</label>
                                    <input required type="text" class="form-control form-control-danger"
                                           id="color"
                                           name="color" autocomplete="off" placeholder="color"
                                           value="{{ old('color', isset($data) ? $data->color : '') }}"
                                           aria-invalid="true">
                                    @if($errors->has('color'))
                                        <label id="color-error" class="error mt-2 text-danger" for="color">Title
                                            Required</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('detail') ? 'has-danger' : '' }}">
                                    <label for="detail">detail</label>
                                    <textarea class="form-control" id="detail" name="detail"
                                              rows="5">{{ old('detail', isset($data) ? $data->detail : '') }}</textarea>
                                    @if($errors->has('detail'))
                                        <label id="detail-error" class="error mt-2 text-danger"
                                               for="detail">Required</label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('bgtext') ? 'has-danger' : '' }}">
                                    <label for="bgtext"> Background Text</label>
                                    <input required type="text" class="form-control form-control-danger"
                                           id="bgtext"
                                           name="bgtext" autocomplete="off" placeholder="background text"
                                           value="{{ old('bgtext', isset($data) ? $data->bgtext : '') }}"
                                           aria-invalid="true">
                                    @if($errors->has('bgtext'))
                                        <label id="bgtext-error" class="error mt-2 text-danger" for="bgtext">Title
                                            Required</label>
                                    @endif
                                </div>
                            </div>


                            




                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-js')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endsection


