<div class="col-lg-12 text-center" style="margin-bottom: 2rem">
    <img src="{{asset($employee->avatar)}}" class="img-responsive" style="margin-bottom: 2rem;max-height:20rem;margin-left: auto!important;margin-right: auto!important;border-radius: 50%!important;" alt="">
    <h3><b>{{$employee->name}}</b></h3>
    <p><em class="fa fa-envelope-o"></em> <b>{{$employee->email}}</b></p>
    <p><em class="fa fa-phone"></em> <b>{{$employee->phone}}</b></p>
    <p><em class="fa fa-map-marker"></em> <b>{{$employee->address}}</b></p>
</div>
