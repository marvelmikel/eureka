@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Exam Title')</th>
                                <th scope="col">@lang('Subject')</th>
                                <th scope="col">@lang('Question')</th>
                                <th scope="col">@lang('User Name')</th>
                                <th scope="col">@lang('Submitted At')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pendings as $pending)
                            <tr>
                                <td data-label="@lang('Exam Title')">
                                    <div class="user">
                                        <div class="thumb"><img src="{{getImage('assets/images/exam/'.$pending->exam->image)}}" alt="image"></div>
                                        <span class="name">{{$pending->exam->title}}</span>
                                    </div>
                                </td>
                                <td data-label="@lang('Subject')"><span class="text--small badge font-weight-normal badge--success">{{$pending->exam->subject->name}}</span></td>
                                <td data-label="@lang('Question')">@lang($pending->writtenQuestion->question)</td>
                                <td data-label="@lang('User Name')"><a href="{{route('admin.users.detail',$pending->user_id)}}">{{$pending->user->username}}</a></td>
                                <td data-label="@lang('Submitted At')">{{showDateTime($pending->created_at,'d M Y')}}</td>
                              
                                <td data-label="@lang('Action')">
                                    <a href="{{route('admin.written.details',[$pending->user_id,$pending->question_id])}}" class="icon-btn" data-toggle="tooltip" data-original-title="@lang('Details')">
                                        <i class="las la-desktop text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{paginateLinks($pendings)}}
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection



@push('breadcrumb-plugins')
    <form action="" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Exam,Question, User')" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush