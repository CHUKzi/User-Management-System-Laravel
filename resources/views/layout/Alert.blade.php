                @foreach($errors->all() as $error)
                <div class="alert alert-danger text-center" role="alert">
                {{$error}}
                </div>

                @endforeach

                @if(session()->has('message'))
                <div class="alert alert-success text-center" role="alert">
                {{ session()->get('message') }}
                </div>
                @endif