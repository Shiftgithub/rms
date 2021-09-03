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
        <form action="{{url('/chefinfoupload')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="" aria-describedby="" placeholder="Enter Chef name" required>
                </div>
                <div class="form-group">
                    <label for="">Speciality</label>
                    <input type="text" name="speciality" class="form-control" id="" placeholder="Speciality" required>
                </div>
                <div class="form-group">
                    <label for="">Chefs Image</label>
                    <input type="file" name="image" class="form-control" id="" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>


            <br>

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Chef Name</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="">Edit</th>
                            <th scope="col" class="">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->name}}</td>
                            <td>{{$data->speciality}}</td>
                            <td><img src="/chefimage/{{$data->image}}"></td>
                            <td>
                                <a href="{{url('/updatechefinfo',$data->id)}}"><button class="btn btn-info">Edit</button></a>
                            </td>
                            <td><a href="{{url('/deletchefinfo',$data->id)}}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include("admin.script")


</body>

</html>