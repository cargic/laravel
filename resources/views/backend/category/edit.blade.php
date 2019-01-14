@extends('layouts.backend')

@section('content')
<div class="col-lg-12" style="padding-top: 20px;">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @if(is_object($errors))
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @endif
                </ul>
            </div>
        @endif
    <section class="panel">
        <header class="panel-heading"><div class="external-event label label-success ui-draggable" style="position: relative;">编辑分类</div></header>
        <div class="panel-body">
            <form class="form-horizontal bordered-group" role="form" action="{{ url('backend/category/'.$cateInfo->cate_id) }}" method="post">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="cate_name" class="form-control input-rounded" value="{{ $cateInfo->cate_name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类标题</label>
                    <div class="col-sm-10">
                        <input type="text" name="cate_title" class="form-control input-rounded" value="{{ $cateInfo->cate_title }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">关键字</label>
                    <div class="col-sm-10">
                        <input type="text" name="cate_keywords" class="form-control input-rounded" value="{{ $cateInfo->cate_keywords }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">层级关系</label>
                    <div class="col-sm-10">
                        <select class="form-control input-rounded" name="cate_pid">
                            <option value="0">==所属上级==</option>
                            @foreach($parentCategory as $v)
                                <option value="{{$v->cate_id}}"
                                    @if($v->cate_id == $cateInfo->cate_pid)selected @endif
                                >{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类排序</label>
                    <div class="col-sm-10">
                        <input class="form-control input-rounded" id="focusedInput" name="cate_order" type="number" value="{{ $cateInfo->cate_order }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类图片</label>
                    <div class="col-sm-10">
                        <input type="file">
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类描述</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-rounded" rows="3" name="cate_description">{{ $cateInfo->cate_description }}</textarea>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10"><button class="btn btn-success btn-rounded" type="submit">编辑分类</button></div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection