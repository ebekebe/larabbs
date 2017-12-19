@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i>编辑个人资料
                </h4>
            </div>
            @include('common.error')

            <div class="panel-body">
                <form action="{{ route('users.update',$user->id) }}" method="post" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input type="text" class="form-control" id="name-field" name="name"
                               value="{{ old('name',$user->name) }}"/>
                    </div>

                    <div class="form-group">
                        <label for="email-field">邮箱 </label>
                        <input type="email" class="form-control" name="email" id="email-field"
                               value="{{ old('email',$user->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="introduction-field">个人简介</label>
                        <textarea class="form-control" name="introduction"
                                  id="introduction-field">{{ old('introduction',$user->introduction) }}</textarea>
                    </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@stop