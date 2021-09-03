<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("admin.navbar")

        <div class="container">
            <h1>Customer Orders</h1>
            <form action="{{url('/search')}}" method="get">
                @csrf
                <input type="text" name="search" class="bg-info text-dark" >
                <button class="btn btn-sucess">Search</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">FoodName</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                @foreach($data as $data)
                <tbody>
                    <tr>
                        <th>{{$data->username}}</th>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->foodname}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->price * $data->quantity}}</td>
                        
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    @include("admin.script")


</body>

</html>