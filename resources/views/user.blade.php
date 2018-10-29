<html>
<body>
@include('layouts.partial.nav')
@section('sidebar')
    This is the master sidebar.
@show
<div class="container">
    @yield('content')
</div>
</body>
</html>
{{--继承布局--}}
@extends('layouts.master')
@section('sidebar')
    <!-- 如果需要调用父类的section 用@parent关键字 -->
    @parent
    <p>This is appended to the master sidebar.</p>
@stop
@section('content')
    <!-- {{}} 输出变量  {{{}}}过滤内容中的 HTML 字符串实体 -->
    Hello, {{ $name }}. {{{age}}}
    <p>This is my body content.</p>
@stop

{{--控制语法--}}
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    No Records.
@endif

@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@while (true)
    <p>looping forever.</p>
@endwhile