<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lics</title>

        <!-- Styles -->
       
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
    <body class="bg-light"> 
        <div class="container pt-5"  style="width: 100%">
            <div>
                @include('create')
                <h2>Licitações</h2>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">+ Nova licitação</button>        
            </div>
            <div class="table-responsive">
                <table id="tabela" class="table table-hover table-success table-striped ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fase</th>
                            <th>Edital</th>
                            <th>Modalidade</th>
                            <th>Abertura</th>
                            <th>Licitador</th>
                            <th>Prioridade</th>  
                            <th>Criado </th>
                            <th>Atualizado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lics as $lic)
                        <tr>
                            <td>{{ $lic->id}} </td>
                            <td>
                                @switch($lic->nu_fase)
                                    @case(-1)
                                        Em Edição
                                        @break
                                    @case(1)
                                        Processada
                                        @break
                                    @case(0)
                                        Descartada
                                @endswitch
                            </td>
                            <td>{{ Str::limit($lic->nu_edital, 5) }}</td>
                            <td>{{ Str::limit($lic->modalidade, 5)  }}</td>  
                            <td>{{ date('d/m/Y', strtotime($lic->data_abertura)) }}</td>
                            
                            @if($lic->nome_licitador === null)
                                <td>--</td> 
                            @else  
                                <td>{{ Str::limit($lic->nome_licitador, 5) }}</td>
                            @endif

                            <td>{{ $lic->prioridade }}</td>
                            <td>{{ date('d/m/Y', strtotime($lic->created_at)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($lic->updated_at)) }}</td>
                            
                            <td>
                            @include('show')
                            @include('edit')
                            <form method="POST" id="myform" action="{{url('/delete/'.$lic->id)}}">
                                
                                <button type="button" class="btn btn-secondary btn-sm" id="showbtn" data-bs-toggle="modal" data-bs-target="#showModal{{$lic->id}}"><i class="fas fa-eye"></i> </button>
                                <button type="button" class="btn btn-warning btn-sm" id="editbtn" data-bs-toggle="modal" data-bs-target="#editModal{{$lic->id}}"><i class="fas fa-edit"></i></button>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" id="deletebtn"><i class="fas fa-trash"></i></button>
                            </form>
                            @if($delete = session('delete'))
                                <script>    
                                    Swal.fire(
                                    'Sucesso!',
                                    '{{ $delete }}',
                                    'success'
                                    ).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location = "/";
                                        }
                                    });
                                </script>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>     
                </table>
            </div>
        </div>   
    </body>
        
    <script>
        new DataTable('#tabela');   
    </script>
</html>
