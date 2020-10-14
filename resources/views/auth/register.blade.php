@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-2 d-none d-lg-block">
        <div class="col">
            <img src="/images/logo.png" alt="Mindanao Art Logo">
        </div>
    </div>

    <div class="col-md">

        <h2>
            <a class="back" href="/">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </a>
            Register
        </h2>

        <div class="container">
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Fullname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                        <input id="mobile" type="number" class=" @error('mobile') is-invalid @enderror" name="mobile" placeholder="Mobile Number" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <select name="category" id="categories" onchange="showOtherDropDown()" class=" @error('categories') is-invalid @enderror">
                        <option value="" selected>Categories</option>
                        <option value="Gallery">Gallery</option>
                        <option value="Regional Group">Regional Group</option>
                        <option value="Special Projects">Special Projects</option>
                        <option value="Featured Artist">Featured Artist</option>
                    </select>

                    @error('categories')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row d-none" id="gallery">
                    <select name="gallery" class="@error('gallery') is-invalid @enderror">
                        <option value="" selected>Choose Gallery...</option>
                        <option value="Agusan Artist Association (AAA)">Agusan Artists Association (AAA)</option>
                        <option value="Alampat Gallery">Alampat Gallery</option>
                        <option value="Datu Bago">Datu Bago</option>
                        <option value="Davao Oriental Artists">Davao Oriental Artists</option>
                        <option value="Deanna Sipaco (DS) Foundation for the Differently-Abled, Inc.">Deanna Sipaco (DS) Foundation for the Differently-Abled, Inc. </option>
                        <option value="Gall Down South">Gallery Down South</option>
                        <option value="Good Times Café and Art Gallery (Zambo Norte)">Good Times Café and Art Gallery (Zambo Norte)</option>
                        <option value="Iligan Visual Artists (IVA)">Iligan Visual Artists (IVA)</option>
                        <option value="Irinugyun">Irinugyun</option>
                        <option value="Likha KARAGA">Likha KARAGA</option>
                        <option value="Lumbayao Artist Collective">Lumbayao Artist Collective</option>
                        <option value="Sining Mata Visual Art & Music School">Sining Mata Visual Art & Music School</option>
                        <option value="Studio One Art Iligan">Studio One Art Iligan</option>
                        <option value="Talaandig Soil Painters">Talaandig Soil Painters</option>
                        <option value="TheBauHaus">TheBauHaus</option>
                        <option value="The Gallery of the Peninsula and the Archipelago">The Gallery of the Peninsula and the Archipelago</option>
                        <option value="TINTA Artists Iligan">TINTA Artists Iligan</option>
                    </select>

                    @error('gallery')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row d-none" id="specialProjects">
                    <select name="specialProjects" class="@error('specialProjects') is-invalid @enderror">
                        <option value="" selected>Choose Special Project...</option>
                        <option value="Tricycle">Tricycle</option>
                        <option value="Heart">Heart</option>
                        <option value="Bangon Luayon">Bangon Luayon</option>
                        <option value="Balay">Balay</option>
                        <option value="Ballpen">Ballpen</option>
                        <option value="Doodle Mural">Doodle Mural</option>
                    </select>

                    @error('specialProjects')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row d-none" id="regionalGroup">
                    <select name="regionalGroup" class="@error('regionalGroup') is-invalid @enderror">
                        <option value="" selected>Choose Regional Group...</option>
                        <option value="North Cotabato">North Cotabato</option>
                        <option value="Caraga Region">Caraga Region</option>
                        <option value="Northern Mindanao">Northern Mindanao</option>
                        <option value="Davao del Sur">Davao del Sur</option>
                        <option value="Zamboanga Peninsula">Zamboanga Peninsula</option>
                    </select>

                    @error('regionalGroup')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                </div>

                <button type="submit">{{ __('SUBMIT >>>') }}
                </button>
            </form>
        </div>
    </div>

    <div class="col-md d-none d-lg-block">
        <img class="picture" src="/images/image2.png" alt="Image2">
    </div>

</div>
@endsection
