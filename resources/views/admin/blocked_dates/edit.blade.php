@extends('admin.layouts.app')

@section('admin_css')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{-- Header --}}
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1><i class="mdi mdi-calendar-remove"></i> Edit Blocked Date</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}"> <i class="mdi mdi-home"></i> Dashboard </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.blocked-dates-index') }}"> <i class="mdi mdi-calendar-remove"></i> Blocked Dates </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

            {{-- Body --}}
            <div class="card card-default">
                <div class="card-header justify-content-between" style="background-color: #4c84ff;">
                </div>
                <div class="card-body">
                    @livewire('backend.blocked-dates.edit-blocked-date', ['id' => $blockedDate->id])
                </div>
            </div>
        </div>
    </div>
@endsection
