@extends('layouts.landing')
@section('title','Registrasi ')
@section('konten')
<style type="text/css">
  .pict img{
    padding-top: 50px;
    height: 500px;
    line-height: 500px;
  }
  .row{
    height: 500px;
    width: 100%;
  }

  .log{
    padding-top: 20px;
    padding-bottom: 30px;
  }

  .bukanjudul{
    text-align: center;
    padding-bottom: 20px;
  }
  a{
    text-decoration: none;

  }

  .judul{
    text-align: center;
    padding-top: 30px;
  }

  button{
    background-color: cyan;
    color: black;
    border-style: none;
    border-radius: 3px;
    height: 40px;
    width: 90px;
    font-size: 18px;

  }
  button:hover{
    background-color: #eaeaea;

  }
  button:active{
    background-color: cyan;
    padding-top: 5px;
  }
  .xx{
    padding-top: 20px;
  }
  .xx a:hover {
    color: salmon;
  }

  .xx a:active{
    color: blue;
  }
  .btn{
    background-color: cyan;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="pict">
        <img src="{{asset('pict/28.jpg')}}">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card mt-5">
        <div class="card-body">
          <h3 class="text-center">Register</h3>
          <p class="text-center">(New User ? Register yourself to get access)</p>
          <br>
          <!-- form validasi -->
          <form action="{{route('admin.registrasi')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input class="form-control" type="text" name="name"></input>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" type="text" name="email"></input>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password"></input>
            </div>
            <div class="form-group mt-3">
              <input class="btn" type="submit" value="Daftar"></input>
            </div>
            <p>Sudah memiliki akun? <a href="{{route('admin.login')}}">Login disini!</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection