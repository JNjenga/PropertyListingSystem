@extends('layouts.admin_layout')

<script type="text/javascript">
    function transferClick() {
        document.querySelector('#image').click();
    }
    //display image put by user
    function displayImg(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('#plcholder').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    //querySelector is a DOM API used to query DOM elements that match a CSS selector.
    function transferProfileClick() {
        document.querySelector('#pic').click();
    }
    //edit admin profile
    function displayProfile(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('#profilePic').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<style>
.alert-success{
        background-color: rgba(0,222,0,0.3);
    }
    .alert-danger{
        background-color: rgba(222,0,0,0.3);
    }
</style>

@section('content')
<body>
    <div class="tcard">

        <div class="card-body">
            @if(\Session::has('success'))
                    <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                    </div>
                    @endif
        </div>
        <!---<div class="homecard">
            <div>
                <p>Click to edit profile</p>
                <form method="POST" action="{{ url('makeprofile') }}">
                    @csrf
                    <img onclick="transferProfileClick()" id="profilePic" src="{{ Auth::user()->pic }}">
                    <input onchange="displayProfile(this)" type="file" style="visibility: hidden;" name="pic" id="pic" required>
                    <button>UPDATE</button>
                </form>
            </div>
            <div class="details-card">
                <h1>USER DETAILS;</h1>
                <ul>
                    <li><h2>Name: {{ Auth::user()->name }}</h2></li>
                    <li><h2>Email: {{ Auth::user()->email }}</h2></li>
                </ul>
                <p>NOTE: This page is for authenticated use only!!</p>
            </div>
        </div>-->
        <div class="homecard">
            <form method="POST" action="{{ url('makeblog') }}">
                <h1>MANAGE BLOG</h1>
                @csrf
                <label for="image">Click avatar to add an image </label>
                <div class="image-placeholder">
                    <img onclick="transferClick()" id="plcholder" src="/images/image-placeholder.png">
                </div>
                <input type="file" onchange="displayImg(this)" name="image" style="visibility: hidden;" id="image" required>
                <br><br>
                <label for="desc">Add a short description: </label>
                <textarea name="desc" id="desc" maxlength="255"></textarea>
                <br><br>
                <button type="submit">POST</button>
                <br><br>
            </form>
        </div>
    </div>
</body>
@endsection
