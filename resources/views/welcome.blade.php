@extends('layouts.app')

@section('content')
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">

            <div class="mt-16">
                <div class="grid gap-12">
                    <div>
                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Population Information
                            Search</h2>
                        <hr/>
                        <div class="row">
                            <div class="countrySelect col-4">
                                <select id="country_id" name="country_id" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="citySelect col-4">
                                <select id="city_id" name="city_id" class="form-control">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="ageGroupSelect col-4">
                                <select id="population_type" name="population_type" class="form-control">
                                    <option value="">Select Age Group</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover mt-5">
                        <thead>
                        <tr>
                            <th class="text-bg-dark">Population Type</th>
                            <th class="text-bg-dark">Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Old</td>
                            <td id="oldNumber"></td>
                        </tr>
                        <tr>
                            <td>Young</td>
                            <td id="youngNumber"></td>
                        </tr>
                        <tr>
                            <td>Child</td>
                            <td id="childNumber"></td>
                        </tr>

                        </tbody>
                    </table>
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
        $('#city_id').on('change', function (e) {
            e.preventDefault();
            $('#population_type').append('<option value="old">Old</option>', '<option value="young">Young</option>', '<option value="child">Child</option>')
        });

        $('#population_type').on('change', function (e) {
            e.preventDefault();
            var cityId = $('#city_id').val();
            var ageGroup = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{route('population.get')}}",
                data: {'city_id': cityId, 'age_group': ageGroup},
                success: function (res) {
                    console.log(res);
                }
            });
        });
    </script>
@endsection
