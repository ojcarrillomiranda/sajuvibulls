<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Paciente id pdf</title>
    <style>
          @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
        .id{
            width: 100%;
            height: 90%;
            margin: 0 auto;
            background-image: url('../public/images/principal.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: 55%;
            background-repeat: no-repeat;
            opacity: 0.3;
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
       .row .col table{
           position: absolute;
           top: 140;
       }
       .card{

       }
       #historia{
           margin-top: 0px;
           font-style: italic;
       }
       .table-responsive{
           margin-top: 100px !important;
       }
       .table tr td{
           border: 2px solid rgb(70, 79, 85);
       }
       .align-middle{
           font-weight: bold;
       }
       #foto{
           border:none;
           background: none;
          margin-left:300px !important;
          margin-top: 0px !important;
       }

       .foto{
           margin-top: 170px !important;
       }

       footer span img{
            border-radius: 150%;
        }


    </style>
</head>
<body>
    <header>
        <img src="../public/images/logo.jpg" style="width: 50px;height:50px;border-radius:150%" class="float-left ml-4 mt-2">
        <h3 class="h5 text-black text-center mt-1">sajuvibulls-Sistema de Veterinaria</h3>
        <h4 class="h5 text-black text-center">Carrera 28 No 13-20</h4>
    </header>
   <div class="id">
    <div class="card" >
        <div class="card-body  p-5">
            <div class="row ">
            <table class="foto">
                <tr>
                    <td class="align-middle " id="foto">
                        <img src="{{ '../public/images/pacientes/'.$historia->paciente->foto }}" style="width: 2cm;height:2cm">
                    </td>
                </tr>
            </table>
            <div class="col show">
                <div class="table-responsive">
                    <h3 id="historia" class=" text-black text-center h1">Historia clinica</h3>
                    <table class="table table-striped table-bordered align-middle">
                        <tr>
                            <td class=" align-middle">No de Historia</td>
                            <td>{{ $historia->id }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Fecha y hora de ingreso</td>
                            <td>{{ $historia->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="  align-middle">Paciente</td>
                            <td>{{ $historia->paciente->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="  align-middle">Dueño</td>
                            <td>{{ $historia->representante->primer_nombre }} {{ $historia->representante->segundo_nombre }}</td>
                        </tr>
                        <tr>
                            <td class="align-middle">Medico responsable</td>
                            <td>{{ $historia->medico->name }} {{ $historia->medico->apellido }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Tipo de consulta</td>
                            <td>{{ $historia->tipoConsulta->descripcion }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Observaciones</td>
                            <td>{{ $historia->observaciones }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Medicamentos</td>
                            <td>{{ $historia->medicamentos}}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Estado</td>
                            <td>{{ $historia->estado}}</td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
   </div>
<footer>
    <h5 class="d-inline h5 text-black">Contactos</h5>
    <span style="width: 50px;height:50px"><img src="../public/images/youtube.png" style="width: 100%;heigth:100%;margin-top:15px"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/face.jpg" style="width: 100%;heigth:100%;margin-top:15px"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/whatsapp.png" style="width: 100%;heigth:100%;margin-top:15px"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/tweeter.png" style="width: 100%;heigth:100%;margin-top:15px"></span>
    <span style="width: 50px;height:50px"><img src="../public/images/instagran.jpg" style="width: 100%;heigth:100%;margin-top:15px"></span>
</footer>
</body>
</html>

