<div class="card rate text-white" style="background:url('{{asset("images/rate.jpg")}}')">
    <div class="card-body overlay">
        <h1 class="card-title">{{$rate->getValue()}} EUR/USD</h1>
        <h4 class="card-subtitle mb-4 text-white">{{$rate->getDate()->format('d-m-Y')}}</h4>
        <h6 class="card-subtitle text-muted">Source <a href="https://www.ecb.europa.eu/home/html/index.en.html">European Central Bank</a></h6>
    </div>
</div>