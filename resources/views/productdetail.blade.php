@extends('template')

@section('content')
                    @foreach($products as $product)
                    <div class="row">
                        <div class="col-md-6"><img src="{{ asset('image/') }}/{{$product->image}}" alt="" class="img-fluid">                        </div>
                        <div class="col-md-6">
                        <form action="{!! URL::to('paypal') !!}" method="post">
                        {{ csrf_field() }}
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p>{{$product->description}}</p>
                            <div style="height: 100px">Quantity <input type="number" id="qty" value="1" min="1" max="10">Available stock: {{{$product->quantity}}}
                            </div>

                            <input type="hidden" id="price" value="{{$product->price}}">
                            <input type="hidden" id="amount" name="amount" value="">

                            <script>
                                function cal(){
                                    document.getElementById("amount")
                                    .value=document.getElementById("qty")
                                    .value*document.getElementById("price").value;
                                }
                            </script>

                            <div style="height: 100px">RM {{$product->price}} <button type="submit" onClick="cal()" style="float:right" class="btn btn-danger btn-xs">BUY NOW</button>
                            </form></div>
                        </div>
                    </div>    
                    @endforeach
@endsection
                