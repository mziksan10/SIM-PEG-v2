    <!-- Just an image -->
    <nav class="navbar navbar-light bg-dark">
        <div class="sidebar-brand-icon ml-3">
            <img src="{{ asset('/assets/img') }}/logo_piksi.png" alt="" class="img" width="40">
            <div class="btn-group btn-group-toggle">
                <label class="btn btn-secondary active">
                    <input type="radio" name="options" checked><b><i>SIM</i></b>
                </label>
                <label class="btn btn-light text-primary">
                    <input type="radio" name="options"><b><i>PEG</i></b>
                </label>
            </div>
        </div>
        <div class="dropdown bg-light shadow-sm" style="border-radius: 5px">
            <button class="btn dropdown-toggle text-dark" type="button" data-toggle="dropdown" aria-expanded="false">
                @if(session()->get('foto') == null)
                <img class="img-profile rounded-circle" src="{{asset('/assets/img/user_default.png')}}" width="20">
                @elseif(session()->get('foto'))
                <img class="img-profile rounded-circle" src="{{asset('storage/' . session()->get('foto'))}}" width="20">
                @endif
            </button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <div class="dropdown-item">
                    {{ strtoupper(auth()->user()->username) }}
                </div>
                <hr class="sidebar-divider my-0">
                <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="fas fa-power-off fa-sm fa-fw mr-2 text-primary"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>