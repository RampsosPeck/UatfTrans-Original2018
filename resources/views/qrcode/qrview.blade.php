<div class="container">
    <div class="row justify-content-center">
        <div class="mt-3">
            <div class="card text-white bg-info">
                <div class="card-header text-center">MI CÓDIGO QR</div>
                <div class="card-body"> 
                     <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->margin(1)->merge('img/qr.png', .2, true)->generate('lindoooo')) !!} "> 
                     <p class="text-center" style="margin-top: 1em; margin-bottom: 0em;">Transporte Universitario U.A.T.F.</p>
                </div>
            </div>
        </div>
    </div>
</div>