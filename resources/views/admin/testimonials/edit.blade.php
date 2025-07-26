@extends('admin.layouts.master')
@section('title', 'Edit Testimonial')
@section('content')
    <x-breadcrub pagetitle="Testimonials" subtitle="Management" title="Edit Testimonial" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Testimonial</h4>
                            @include('admin.testimonials.form', ['testimonial' => $testimonial])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection