<h1>puto inserte token</h1>



@include('sweetalert::alert')
<form id="login-form" class="form" action="/EliminarToken" method="POST" class="d-none">

@csrf

<input type="text" value="{{$ido}}" name="id">

@include('sweetalert::alert')




<div class="container">
    <div class="row mt-3">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Tokens de seguridad
                </div>

                <div class="card-body">
<center>                        Inserta tu token <b style="color:red;">{{ auth()->user()->nombre }}</b> por favor para realizar cualquier accion
</center>                        {{-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="token" id="name" name="user">
                    </div> --}}

                    <div class="form-group" id="data-message">

                    </div>
                    <p id="myList"></p>
                    otherviewEdit.blade
                    <div class="form-group">
                        <textarea rows="10" cols="50" id="message" class="form-control" placeholder="Message" name="TokTok"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Editar</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




    </form>
