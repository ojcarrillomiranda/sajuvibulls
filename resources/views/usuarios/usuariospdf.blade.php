<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Usuarios pdf</title>
    <style>
          @page {
            margin: 0cm 0cm;
            font-family: Arial;
            font-size: 14px;
        }
        .id{
            width: 100%;
            /* height: 90%; */
            margin: 0 auto;
            background-image: url('../public/images/principal.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: 50%;
            background-repeat: no-repeat;
            opacity: 0.3;
            margin-top: 90px;

        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: rgba(102, 235, 135, 0.8);
            color: rgb(20, 20, 20);
            text-align: initial;
            line-height: 30px;
            font-style: italic;
        }
        header img{
            border-radius:150%;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: rgba(102, 235, 135, 0.8);
            color: #000;
            text-align: center;
            line-height: 35px;
            font-style: italic;
        }
        #paciente{
            font-style: italic;
            position: relative;
           top: 0;
        }

        footer span img{
            border-radius: 150%;
        }
        #tabla tr td{
           border: 1px solid rgb(70, 79, 85);

        }
        #tabla th{
            border: 1px solid #035e0f;
        }



    </style>
</head>
<body>
    <header>
        <img src="../public/images/logo.jpg" style="width: 50px;height:50px" class="float-left ml-4 mt-2">
        <h3 class="h5 text-black text-center mt-1">sajuvibulls-Sistema de Veterinaria</h3>
        <h4 class="h5 text-black text-center">Carrera 28 No 13-20</h4>
    </header>
    <div class="id">
        <div class="card bg-secondary" >
            <div class="card-body  p-5">
            <div class="row ">
                <div class="col show">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <h3 id="paciente" class="text-black" style="margin-top: 30">Usuarios</h3>
                            <p><h5  style=" font-style: italic;">Registros encontrados: {{ $numero }}</h5></p>
                            <table class="table table-striped  table-bordered " id="tabla"  style="margin-top: 10px">
                                <thead class=" text-center bg-success">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">TIPO DOCUMENTO</th>
                                        <th scope="col">DOCUMENTO</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">APELLIDO</th>
                                        <th scope="col">USUARIO</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">PERMISO</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td class="text-center">{{ $usuario->user->id }}</td>
                                            <td>{{ $usuario->user->tipo_documento}}</td>
                                            <td>{{ $usuario->user->documento}}</td>
                                            <td>{{ $usuario->user->name}}</td>
                                            <td>{{ $usuario->user->apellido}}</td>
                                            <td>{{ $usuario->user->username }}</td>
                                            <td>{{ $usuario->user->email }}</td>
                                            <td>{{ $usuario->permiso->rol }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <h5 class="d-inline h5 text-black">Contactos</h5>
    <span style="width: 50px;height:50px"><img src="../public/images/youtube.png" style="width: 100%;heigth:100%;margin-top:15px" class="rounded-circle"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/face.jpg" style="width: 100%;heigth:100%;margin-top:15px;border-radius:150%" class="rounded-circle"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/whatsapp.png" style="width: 100%;heigth:100%;margin-top:15px"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/tweeter.png" style="width: 100%;heigth:100%;margin-top:15px"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/instagran.jpg" style="width: 100%;heigth:100%;margin-top:15px"></span>
</footer>
</body>
</html>


