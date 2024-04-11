@extends('layouts.base')

@section('styles')
<link href="{{ asset('css/login/css/login.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'Ingresar')

@section('content')
<section class="h-screen">
    <div class="h-full">
        <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
            <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                <img src="img/itszologo.png" class="w-full" alt="Sample image" />
            </div>

            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                <form method="POST" class="form" action="{{ route('login') }}">
                    @csrf
                    <h2>Iniciar sesión</h2>
                    <div class="content-login">
                        <div class="relative mb-6">
                            <input type="text" name="email" id="email" placeholder="Correo electrónico" value="{{ old('email') }}" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0">
                            <label for="email" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Correo electrónico</label>
                        </div>

                        <div class="relative mb-6">
                            <input type="password" name="password" id="password" placeholder="Contraseña" value="" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0">
                            <label for="password" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[1.15rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Contraseña</label>
                        </div>
                    </div>

                    <a href="{{ route('password.request') }}" class="password-reset">Olvidé mi contraseña</a>

                    <button type="submit" class="button">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
