@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="text-center">
                        <i class="glyphicon glyphicon-edit"></i>
                        @if($topic->id)
                            编辑话题
                        @else
                            新建话题
                        @endif
                    </h2>
                    <hr>

                    @include('common.error')

                    @if($topic->id)
                        <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                            @else
                                <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                                    @endif

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="form-group">
                                        <input class="form-control" type="text" name="title" id="title-field"
                                               value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required/>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="category_id" required>
                                            <option value="" hidden disabled selected>请选择分类</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="body" id="editor" class="form-control"
                                                  placeholder="请至少填入三个字符的内容" rows="3" required>
                                            {{ old('body', $topic->body ) }}
                                        </textarea>
                                    </div>


                                    <div class="well well-sm">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save"></span>保存
                                        </button>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $('#editor'),
            });
        });
    </script>
@stop


@endsection