@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')
@include('administrative.includes.breadcrumb')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">item Edit</h4>
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
            <h6 class="card-title">item Edit</h6>
            <form class="forms-sample" action="{{route('administrative.item.update', $item->id)}} " method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                <div class="col-md-12">
                        <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                            <label for="title"> Title</label>
                            <input required type="text" class="form-control form-control-danger" id="title"
                                   name="title" autocomplete="off" placeholder="Title"
                                   value="{{ old('title', isset($item) ? $item->title : '') }}"
                                   aria-invalid="true">
                            @if($errors->has('title'))
                                <label id="title-error" class="error mt-2 text-danger" for="title">Title Required</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-2">
                        <img src="{{ $item->image }}" alt="image" width="100px">
                    </div>
                    <div class="col-md-2">
                    <div class="form-group {{ $errors->has('color') ? 'has-danger' : '' }}">
                            <label for="color">color</label>

                            <select class="form-control" name="color" id="color" required>
                                <option
                                    value="green" {{ $item->color == 'green' ? 'selected' : '' }}>
                                    Green 
                                </option>
                                <option
                                    value="yellow" {{ $item->color == 'yellow' ? 'selected' : '' }}>
                                    yellow 
                                </option>
                                <option
                                    value="red" {{ $item->color == 'red' ? 'selected' : '' }}>
                                    Red 
                                </option>
                                <option
                                    value="blue" {{ $item->color == 'blue' ? 'selected' : '' }}>
                                    Blue 
                                </option>
                                <option
                                    value="pink" {{ $item->color == 'pink' ? 'selected' : '' }}>
                                      Pink 
                                </option>
                            </select>
                            @if($errors->has('color'))
                                <label id="name-error" class="error mt-2 text-danger"
                                       for="name"> {{ $errors->first('color') }}
                                </label>
                            @endif
                        </div></div>
                        <div class="col-md-2">
                    <div class="form-group {{ $errors->has('type') ? 'has-danger' : '' }}">
                            <label for="type">Type</label>

                            <select class="form-control" name="type" id="type" required>
                                <option
                                    value="high" {{ $item->type == 'high' ? 'selected' : '' }}>
                                    High Priority
                                </option>
                                <option
                                    value="mid" {{ $item->type == 'mid' ? 'selected' : '' }}>
                                    Mid Priority
                                </option>
                                <option
                                    value="low" {{ $item->type == 'low' ? 'selected' : '' }}>
                                      Low Priority
                                </option>
                            </select>
                            @if($errors->has('type'))
                                <label id="name-error" class="error mt-2 text-danger"
                                       for="name"> {{ $errors->first('type') }}
                                </label>
                            @endif
                        </div> </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('detail') ? 'has-danger' : '' }}">
                            <label for="detail">detail</label>
                            <textarea class="form-control" id="detail" name="detail"
                                      rows="5">{{ old('detail', isset($item) ? $item->detail : '') }}</textarea>
                            @if($errors->has('detail'))
                                <label id="detail-error" class="error mt-2 text-danger"
                                       for="detail">Required</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('bgtext') ? 'has-danger' : '' }}">
                            <label for="bgtext"> Background text</label>
                            <input required type="text" class="form-control form-control-danger" id="bgtext"
                                   name="bgtext" autocomplete="off" placeholder="Title"
                                   value="{{ old('bgtext', isset($item) ? $item->bgtext : '') }}"
                                   aria-invalid="true">
                            @if($errors->has('bgtext'))
                                <label id="bgtext-error" class="error mt-2 text-danger" for="bgtext">Title Required</label>
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


