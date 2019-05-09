<div class="card forecast text-white" style="background:url('{{asset("images/forecast")}}/{{$forecast['hourly']['icon']}}.jpg')">
    <div class="card-body overlay">
        <h5 class="card-title">{{$forecast['timezone']}}</h5>
        <h2 class="mb-2">{{$forecast['hourly']['data'][0]['temperature']}}&#176;C</h2>
        <p class="card-text mb-4">{{$forecast['hourly']['summary']}}</p>
        <h6 class="card-subtitle text-muted">Source <a href="https://forecast.io">Forecast.io</a></h6>
    </div>
</div>