<div class="col-lg-3">
    <img src="{{asset($user->avatar)}}" class="img-responsive" alt="">
</div>
<div class="col-lg-9">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Full Name</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{$user->address}}</td>
            </tr>
        </tbody>
    </table>
</div>