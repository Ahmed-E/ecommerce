@extends ('backend.layouts.master')


@section ('title',trans('eav.eav_category_management'))

@section('after-styles-end')
    {!! HTML::style('css/backend/plugin/datatables/dataTables.bootstrap.css') !!}
    {!! HTML::style('css/backend/plugin/nestable/jquery.nestable.css') !!}
@endsection


@section('page-header')
    <h1>
        {{ trans('eav.eav_category_management') }}
        <small>{{ trans('eav.active_eav_category') }}</small>
    </h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-info">
                <i class="fa fa-info-circle"></i> Here are the list of Attribute(s) in this particular Attribute Category.<br />
                <a href="{{route('admin.category.create')}}"><i class="fa fa-plus"> </i> {{ trans('category.add_new_category') }}</a>
                <a class="pull-right" href="{{route('admin.eav.category.index')}}"><i class="fa fa-retweet"> </i> Back to All  category</a>
            </div><!--alert info-->

            <div class="dd permission-hierarchy">
                <ol class="dd-list">
                    <li class="dd-item" data-id="">
                        @if ($categorys->count())
                            @foreach($categorys as $category)
                                @if($category->parent_id == NULL)
                        <div class="dd-handle">{!! $category->category_description['meta_title'] !!}  <span class="pull-right">{!! $categorys->count() !!} Attributes</span></div>
                                    <ol class="dd-list">
                                        @foreach($categorys as $category_h)
                                          @if($category_h->parent_id == $category->id)
                                            <li class="dd-item" data-id="{!! $category->id !!}">
                                                <div class="dd-handle"><a href="/asd">{!! $category_h->category_description->name !!} </a> <span class="pull-right">{!! $category->status ? "Active" : "Not Active" !!} </span></div>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ol>

                                 @endif
                                    @endforeach


                        @else

                    @endif
                    </li>
                </ol>
            </div><!--master-list-->
        </div><!--col-lg-4-->
    </div>
@endsection

@section('after-scripts-end')
    {!! HTML::script('js/backend/plugin/nestable/jquery.nestable.js') !!}
@stop