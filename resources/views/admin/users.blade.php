<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")

        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach($data as $data)
                <tbody>
                    <tr>
                        <td scope="row">{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>

                        @if($data->usertype=="0")
                        <td><a href="{{url('/deleteuser',$data->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                        @else
                        <td class="bg-light">Not Allow</a></td>
                        @endif

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @include("admin.script")


</body>

</html>