@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="btn-group mb-10">
                            <a href="{{route('dashboard','country')}}" class="btn btn-outline-primary" id="country">Add
                                Country</a>
                            <a href="{{route('dashboard','city')}}" class="btn btn-outline-info" id="city">Add City</a>
                            <a href="{{route('dashboard','population')}}" class="btn btn-outline-warning"
                               id="population">Add Population</a>
                        </div>
                        <div class="form-group">
                            @if($formType == 'city')
                                <div class="form-city">
                                    <form method="POST" action="{{ route('city.store') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="country_id"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Select Country') }}</label>

                                            <div class="col-md-6">
                                                <select name="country_id" id="country_id"
                                                        class="form-control @error('country_id') is-invalid @enderror"
                                                        required>
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>

                                                @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="city"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('City Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="city" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}" placeholder="eg: Kathmandu" required>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Create') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @elseif($formType == 'population')
                                <div class="form-population">
                                    <form method="POST" action="{{ route('population.store') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="country_id"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Select Country') }}</label>

                                            <div class="col-md-6">
                                                <select name="country_id" id="country_id"
                                                        class="form-control @error('country_id') is-invalid @enderror"
                                                        required>
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>

                                                @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="city_id"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Select City') }}</label>

                                            <div class="col-md-6">
                                                <select name="city_id" id="city_id"
                                                        class="form-control @error('city_id') is-invalid @enderror"
                                                        required>
                                                    <option value="">Select City</option>
                                                </select>

                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="type"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Select Type') }}</label>

                                            <div class="col-md-6">
                                                <select name="type" id="type"
                                                        class="form-control @error('type') is-invalid @enderror"
                                                        required>
                                                    <option value="">Select Type</option>
                                                    <option value="old">Old</option>
                                                    <option value="young">Young</option>
                                                    <option value="child">Child</option>
                                                </select>

                                                @error('type')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="population"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Population') }}</label>

                                            <div class="col-md-6">
                                                <input id="population" type="text"
                                                       class="form-control @error('population') is-invalid @enderror"
                                                       name="number"
                                                       value="{{ old('number') }}" placeholder="eg: 10000" required>

                                                @error('number')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Create') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="form-country">
                                    <form method="POST" action="{{ route('country.store') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="country"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Country Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="country" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}" placeholder="eg: Nepal" required>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Create') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            var countryID = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{route('city.get')}}",
                data: {'country_id': countryID},
                success: function (res) {
                    // $('#city').html(result);
                    $.each(res, function (key, value) {
                        $("#city_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
@endsection
