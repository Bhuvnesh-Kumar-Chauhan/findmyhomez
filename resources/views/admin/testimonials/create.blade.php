@extends('admin.layouts.master')
@section('title', 'Add Testimonial')
@section('content')
    <x-breadcrub pagetitle="Testimonials" subtitle="Management" title="Add Testimonial" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Testimonial</h4>
                            @include('admin.testimonials.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection