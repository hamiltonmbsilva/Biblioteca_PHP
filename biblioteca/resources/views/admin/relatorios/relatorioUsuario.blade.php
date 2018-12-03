<html>
<head>

    <style>
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        body{
            border-width: medium;
            border-style: solid;
            border-color: #000000;
        }
        .relatorio{


            border-width: medium;
            border-style: solid;
            border-color: #00acd6;
        }

    </style>
</head>


<body >

<table align="center" width="96%" border="2" >
    <tr>
        <td align="center" colspan="2" style="color: Red; font-size: 150%">
            <u><b>Relatorios de todos os Usuario</b></u>
        </td>
    </tr>
    <tr>
    </tr>
</table>



<table align="center" width="96%" border="2" >

    <tr align="center">
        <td align="center" style="width: 15%">
            <b>Nome do Usuario</b>
        </td>
        <td align="center"  style="width: 15%">
            <b>Email</b>
        </td>

        <td align="center" style="width: 10%">
            <b>Idade</b>
        </td>
        <td align="center" style="width: 10%">
            <b>CPF</b>
        </td>
        <td align="center" style="width: 10%">
            <b>RG</b>
        </td>

    </tr>
    @foreach( $usuario as $u)

            <tr align="center">
                <td align="center" style="width: 15%">
                        {{$u->name}}
                </td>
                <td align="center" style="width: 15%">
                    {{$u->email}}
                </td>

                <td align="center" style="width: 10%">
                        {{$u->idade}}
                </td>
                <td align="center" style="width: 15%">
                        {{$u->cpf}}
                </td>
                <td align="center" style="width: 15%">
                        {{$u->rg}}
                </td>

            </tr>

    @endforeach

</table>
</body>
</html>
