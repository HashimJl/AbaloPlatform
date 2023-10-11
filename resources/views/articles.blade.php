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
                <td><button> + </button>
                    <button> - </button></td>
                <td><button>Delete Article</button></td>
            </tr>
        @endforeach
    </table>

    <script>

    </script>
@endsection
