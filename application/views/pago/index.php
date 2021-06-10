<div class="card mt-50 mb-50">
    <div class="card-title mx-auto"> Metodo de Pago </div>
    <div class="nav">
        <ul class="mx-auto">
            <li><a href="#">Cuenta</a></li>
            <li class="active"><a href="#">Pago</a></li>
        </ul>
    </div>
    <form> <span id="card-header">Saved cards:</span>
        <div class="row row-1">
            <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /></div>
            <div class="col-7"> <input type="text" placeholder="**** **** **** 3193"> </div>
            <div class="col-3 d-flex justify-content-center"> <a href="#">Remove card</a> </div>
        </div>
        <div class="row row-1">
            <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" /></div>
            <div class="col-7"> <input type="text" placeholder="**** **** **** 4296"> </div>
            <div class="col-3 d-flex justify-content-center"> <a href="#">Remove card</a> </div>
        </div> <span id="card-header">Agregar nueva Tarjeta:</span>
        <div class="row-1">
            <div class="row row-2"> <span id="card-inner">Nombre en la Tarjeta</span> </div>
            <div class="row row-2"> <input type="text" placeholder=""> </div>
        </div>
        <div class="row three">
            <div class="col-7">
                <div class="row-1">
                    <div class="row row-2"> <span id="card-inner">Numero en la Tarjeta</span> </div>
                    <div class="row row-2"> <input type="text" placeholder="####-####-#"> </div>
                </div>
            </div>
            <div class="col-2"> <input type="text" placeholder="DD-MM-YY"> Fecha de Vencimiento </div>
            <div class="col-2"> <input type="text" placeholder="CVV"> </div>
        </div> <button class="btn d-flex mx-auto"><b>GUARDAR</b></button>
    </form>
</div>