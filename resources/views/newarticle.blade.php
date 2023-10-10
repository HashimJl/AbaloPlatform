@extends('layouts.index')
@section('title', 'insert article')

@section('content')
    <form class="row g-3" id="newArticle" method="post" action="/articles">
        <div class="col-md-6">
            <label for="name" class="form-label">Article Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Article Price:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="col-12">
            <label for="desc" class="form-label">Article Description</label>
            <textarea class="form-control" id="desc" name="desc"> </textarea>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Insert to marketplace</button>
        </div>
    </form>

    <script>
        window.addEventListener('load', () => {
            function sendData() {
                let xhr = new XMLHttpRequest();
                const form = document.getElementById('newArticle');
                const data = new FormData(form);

                xhr.open('POST', '/articles');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                        } else {
                            console.error(xhr.statusText);
                        }
                    }
                }
                xhr.send(data);
            }
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                sendData();
            });
        })
    </script>
@endsection
