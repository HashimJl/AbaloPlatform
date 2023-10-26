@extends('layouts.index')

@section('title','articles')

@section('content')
    <table border="1">
        <tr>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>picture</th>
            <th>shopping cart</th>
        </tr>
        @foreach($data as $key => $value)
            <tr>
                <td>{{$value->ab_name}}</td>
                <td>{{$value->ab_price}}</td>
                <td>{{$value->ab_description}}</td>
                    @foreach($imgNames as $imgName)
                        @if($value->id == preg_replace("/.(jpg|png)/", "",$imgName))
                            <td><img src="/articleimages/{{$imgName}}" width="100" height="100" alt="no image"> </td>
                        @endif
                    @endforeach
                <td><button type="button" id="add" name="add" onclick="addToCart('{{$value->id}}')"> + </button>
                    <button type="button" id="drop" name="drop" onclick="removeFromCart('{{$value->id}}')"> - </button></td>
                <td><button>Delete Article</button></td>
            </tr>
        @endforeach
    </table>

    <script>
        // TO FIX: add to shoppingcart via axios post
        axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        function addToCart(id) {
            axios.post(`/api/shoppingcart`, {
                id, csrfToken
            })
                .then(response => {
                    console.log('article added to shoppingcart!');
                })
                .catch(error => {
                    console.warn('error! article could not be added to cart!' +error)
                })
        }

        function removeFromCart(id) {
            console.log('removeFromCart' + id);
        }
    </script>
@endsection
