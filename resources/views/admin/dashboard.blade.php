@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>
    </header>
    <div class="row">
        <div class="col-6">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Product Requisitions</h4>
                </header>
            </section>
            <div class="card-body">
                <div class="row">
                    <table class="table table-condensed table-striped" style="text-transform: uppercase;font-size:11px;">
                        <thead>
                            <tr>    
                                <th class="text-center">#</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Branch</th>
                                <th class="text-center">Supplier</th>
                                <th class="text-center">Requested By</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($request->date)->toFormattedDateString() }}</td>
                                <td>{{ $request->branch->name }}</td>
                                <td>{{ $request->supplier->name }}</td>
                                <td>{{ $request->requestedBy->name }}</td>
                                <td class="text-center">
                                    @if(Auth::user()->usertype_id == 2)
                                    <div class="btn-group flex-wrap">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-wrench"></i><span class="caret"></span></button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item text-1" href="{{ route('product-request.approve-request',$request->id) }}">Check & Approve</a>
                                        </div>
                                    </div>
                                    @else
                                    {{ ($request->isApproved == 1) ? 'APPROVED' : 'PENDING' }}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">NO RECORDS</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('modals')
@endpush