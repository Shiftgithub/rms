<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include("admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")

        <form action="{{url('/editchefinfo',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="" aria-describedby="" value="{{$data->name}}" required>
                </div>
                <div class="form-group">
                    <label for="">Speciality</label>
                    <input type="text" name="speciality" class="form-control" id="" value="{{$data->speciality}}" required>
                </div>
                <div class="form-group">
                    <label for="">Chefs Current Image</label>
                    <img height="150" width="150" src="/chefimage/{{$data->image}}">
                </div>
                <div class="form-group">
                    <label for="">Choose new Image if you want</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
    </div>
    
    @include("admin.script")


</body>

</html>