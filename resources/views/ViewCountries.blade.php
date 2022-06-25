@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new country') }}</div>

                <div class="card-body">
                    <form method="POST" action="<?php  echo url('/');  ?>/CreateCountry">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('Name') }}" required  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="longitude" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>

                            <div class="col-md-6">
                                <input id="lng" type="text" class="form-control" name="lng" value="{{ old('Longitude') }}" required  autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

                            <div class="col-md-6">
                                <input id="lat" type="text" class="form-control" name="lat" value="{{ old('Latitude') }}" required  autofocus>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('MAP') }}</label>

                            <div class="col-md-6">
                                 <div id="map" style="height:400px; width: 800px;" class="my-3"></div>

                            <script>
                                let map;
                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: { lat: -34.397, lng: 150.644 },
                                        zoom: 8,
                                        scrollwheel: true,
                                    });
                                    const uluru = { lat: -34.397, lng: 150.644 };
                                    let marker = new google.maps.Marker({
                                        position: uluru,
                                        map: map,
                                        draggable: true
                                    });
                                    google.maps.event.addListener(marker,'position_changed',
                                        function (){
                                            let lat = marker.position.lat()
                                            let lng = marker.position.lng()
                                            $('#lat').val(lat)
                                            $('#lng').val(lng)
                                        })
                                    google.maps.event.addListener(map,'click',
                                    function (event){
                                        pos = event.latLng
                                        marker.setPosition(pos)
                                    })
                                }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                                    type="text/javascript"></script>
                                 </div>
                            </div>
                        </div>
                    
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <table class="table">
                <br>
               
                <thead>
                <h4>List of Countries</h4>
                    <tr>
                        <th scope="col">Country name</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($countries as $country){ ?>
                    <tr>
                        <td scope="row"><?php echo $country->name;?></td>
                        <td scope="row"><?php echo $country->longitude;?></td>
                        <td scope="row"><?php echo $country->latitude;?></td>
                        <td class="center"><a href="<?php  echo url('/');  ?>/DeleteCountry/<?php echo $country->id;?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
