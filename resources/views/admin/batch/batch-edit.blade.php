@extends('admin.admin_master')
@section('title', 'Batch Update')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('batch.index') }}">Batch</a></li>
              <li class="breadcrumb-item active">Edit Batch</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Edit Batch</h3>
            </div>
            <form action="{{ route('batch.update', $batches->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Course</option>
                        @foreach($course as $item )
                            <option value="{{ $item->id }}" {{ $item->id == $batches->course_id ? 'selected': ''}}>{{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Batch Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="batch_name" value="{{ $batches->batch_name }}">
                    @error('batch_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update Batch">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
