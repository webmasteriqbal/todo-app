<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="text-center">TODO APP</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <form
                                action="@isset($todo) {{ route('todo.update',$todo->id) }} @else {{ route('todos.create') }}@endisset"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name"> Todo Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="@isset($todo){{ $todo->name }}@endisset">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dec">description </label>
                                    <textarea name="dec" id="dec"
                                        class=" form-control">@isset($todo){{ $todo->dec }}@endisset</textarea>
                                    @error('dec')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    @isset($todo)
                                    Update
                                    @else
                                    Create
                                    @endisset
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">description</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $key=>$todo)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $todo->name}}</td>
                                    <td>{{ $todo->dec }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('todo.edit',$todo->id) }}">Edit</a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('todo.delete',$todo->id) }}">Delete</a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
