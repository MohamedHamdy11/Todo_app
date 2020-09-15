<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 50%">
                <div class="card-header text-center">
                    <h1>All Todos</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($todos as $todo)
                            <li class="list-group-item text-muted">
                                {{ $todo->title }}
                                <span class="float-right">
                                    <a href="#" style="color:#f44336"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="#" style="color:#3fe430"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="#" style="color:#364fc2cc"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
