@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('Family Tree') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('families.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add New Family
                        </a>
                        <a href="{{ route('families.create') }}" class="btn btn-primary d-sm-none btn-icon"
                            aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col">
                    <div class="tree">
                        <ul>
                            @foreach ($families as $family)
                                @include('families.list', ['family' => $family])
                            @endforeach
                        </ul>
                        {{-- <ul>
                            <li>
                                <a href="#">Parent</a>
                                <ul>
                                    <li>
                                        <a href="#">Child</a>
                                        <ul>
                                            <li>
                                                <a href="#">Grand Child</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Child</a>
                                        <ul>
                                            <li><a href="#">Grand Child</a></li>
                                            <li>
                                                <a href="#">Grand Child</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Great Grand Child</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Great Grand Child</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Great Grand Child</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Grand Child</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
