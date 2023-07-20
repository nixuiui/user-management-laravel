<!DOCTYPE html>
<html lang="en">
@include('partials.admin.htmlheader')
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-6 mt-5">
                <div class="form-holder" style="background: #FFF; padding: 24px; border-radius: 16px;">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Masuk ke Akun</h3>
                            @if(session('success'))
                                {{-- <div class="alert alert-success alert-dismissible fade show with-icon" role="alert"> --}}
                                    {!! session('success') !!}
                                {{-- </div> --}}
                            @elseif(session('danger'))
                                {{-- <div class="alert alert-danger alert-dismissible fade show with-icon" role="alert"> --}}
                                    {!! session('danger') !!}
                                {{-- </div> --}}
                            @endif
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <input class="form-control mb-5" type="text" name="email" placeholder="Email" required>
                                <input class="form-control mb-5" type="password" name="password" placeholder="Password" required>
                                <button id="submit" type="submit" class="btn btn-lg btn-primary btn-block">Masuk</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>