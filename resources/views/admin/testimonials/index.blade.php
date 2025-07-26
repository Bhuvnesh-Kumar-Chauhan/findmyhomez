@extends('admin.layouts.master')
@section('title', 'Testimonials')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .client-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        .rating-stars {
            color: gold;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Testimonials" subtitle="Management" title="Testimonials" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Testimonial List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Testimonial
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Client</th>
                                            <th>Photo</th>
                                            <th>Position</th>
                                            <th>Company</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->client_name }}</td>
                                            <td>
                                                @if($testimonial->client_photo)
                                                    <img src="{{ asset('storage/' . $testimonial->client_photo) }}" 
                                                         alt="{{ $testimonial->client_name }}" 
                                                         class="client-photo">
                                                @else
                                                    <div class="client-photo bg-light text-center d-flex align-items-center justify-content-center">
                                                        <i class="mdi mdi-account" style="font-size: 24px;"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->position ?? 'N/A' }}</td>
                                            <td>{{ $testimonial->company ?? 'N/A' }}</td>
                                            <td>
                                                <span class="rating-stars">{{ $testimonial->rating_stars }}</span>
                                            </td>
                                            <td>
                                                @if($testimonial->status === 'active')
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                                                   class="me-3 text-primary" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [1, 6] } // Disable sorting for photo and actions columns
                ],
                order: [[0, 'asc']] // Default sort by client name
            });
        });
    </script>
@endsection