<div>
    <div class="col-12">
        <div class="form-item w-100 mb-3 mb-lg-0">
            <select class="form-control" name="region">
                @foreach($regions as $region)
                    <option value="{{$region}}">{{$region}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-item w-100 mb-3 mb-lg-0">
            <select class="form-control" name="city">
                @foreach($cities as $city)
                    <option value="{{$city}}">{{$city}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
