@extends('layouts.admin-blue.index')

@section('title', 'My Page Title')

@php
    // use App\Helpers\CkeditorHelper1;
    use App\Facades\HlpCkeditor;
@endphp

@section('content')


    <h1>Welcome to My Page</h1>
    {{-- <h2 class="flex justify-center">Test: {{ CkeditorHelper1::classicEditor("hahah") }}</h2> --}}
    {{-- <div style="display: flex; width: '100%'; flex-direction: column;"> --}}

        <div class="editor"></div>
        <div class="editor"></div>
        {{-- <div style="display: flex; width: 500px; flex-direction: column;"> --}}
            <textarea name="content1" class="editor"></textarea>
        {{-- </div> --}}

        <textarea name="content2" class="editor"></textarea>
        <textarea name="content3" class="editor"></textarea>
        <textarea name="content3" class="editor1"></textarea>
    {{-- </div> --}}
    {!! HlpCkeditor::process(['class' => 'editor', 'method' => 'basic', 'width' => '30%', 'height' => '500px']) !!}

    {{-- {!! CkeditorFacade('advance', ['editor', '100%', '300px']) !!} --}}
    {{-- {!! hlpCkeditor->process('advance',['editor', '70%', '100px']) !!} --}}
@endsection
