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
            <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" id="" aria-describedby="" placeholder="Write a title" required>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" id="" placeholder="Price" required>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" id="" placeholder="image" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" id="" placeholder="Description" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </br>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="">Edit</th>
                            <th scope="col" class="">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->title}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->description}}</td>
                            <td><img src="/foodimage/{{$data->image}}"></td>
                            <td>
                                <a href="{{url('/editmenu',$data->id)}}"><button class="btn btn-info">Edit</button></a>
                            </td>
                            <td><a href="{{url('/deletemenu',$data->id)}}"><button class="btn btn-danger">Delete</button></a>
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