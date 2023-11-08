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
                <td><button type="button" id="delete" onclick="deleteArticle('{{$value->id}}')">Delete Article</button></td>
            </tr>
        @endforeach
    </table>

    <script>

        // TO FIX: create temporary shopping cart
        function addToCart(id) {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/api/shoppingcart',{
                id: id,
                _token: csrfToken
            })
                .then(response => {
                    console.log('article added to shoppingcart!');
                })
                .catch(error => {
                    console.warn('error! article could not be added to cart!' +error.response.data)
                })
        }

        function removeFromCart(id) {
            console.log('removeFromCart' + id);
        }

        function deleteArticle(id) {
            axios.delete('/api/articles/'+id)
                .then(response => {
                    console.log('succesfully deleted!')
                })
                .catch(error => {
                    console.warn('can not be deleted succesfully.')
                })
        }
    </script>
@endsection
