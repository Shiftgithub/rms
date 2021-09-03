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

    <div>
            <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" id="" aria-describedby="" value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" id="" value="{{$data->price}}">
                </div>
                <div class="form-group">
                    <label for="">Current Image</label>
                    <img height="150" width="150" src="/foodimage/{{$data->image}}">
                </div>
                <div class="form-group">
                    <label for="">Choose new Image if you want</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" id="" value="{{$data->description}}">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </br>
            <div>
</div>
    @include("admin.script")


</body>

</html>