@extends('admin/layouts/admin')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <h1>Car edit</h1>
                </div>
                <div class="card-body pt-0">
                    <div id="kt_docs_repeater_basic">
                        <div class="form-group mt-4">
                            <div data-repeater-list="kt_docs_repeater_basic">
                                <div data-repeater-item>
                                    <form action="{{ route('cars.edit', $car->id) }}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="form-label">Name:</label>
                                                <input name="name" type="text" class="form-control mb-2 mb-md-0"
                                                    placeholder="Car name" value="{{ $car->name }}" />
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Price:</label>
                                                <input name="price" type="number" class="form-control mb-2 mb-md-0"
                                                    placeholder="Car price" value="{{ $car->price }}" />
                                            </div>

                                            <div class="col-md-3">
                                                <label class="form-label">Category:</label>
                                                <select name="category" class="form-control mb-2 mb-md-0">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->name }}" @if ($category->id == $car->category_id) selected @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-10">
                                            <label class="form-label">Description:</label>
                                            <textarea name="description" class="form-control mb-2 mb-md-0" rows="10">{{ $car->description }}</textarea>
                                        </div>

                                        <div class="form-group row mt-10">
                                            @foreach ($filters as $name => $values)
                                                <div class="fv-row mb-7">
                                                    <label class="required fs-6 fw-bold mb-2" for="{{ $name }}">{{ $name }}</label>

                                                    <select class="form-control" class="form-control form-control-solid" id="{{ $name }}" name="filters[{{ $name }}][]" multiple>
                                                        @foreach ($values as $value)
                                                            <option value="{{ $value->value }}">{{ $value->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="submit" data-repeater-create class="btn btn-light-primary w-100">
                                                Update  
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
