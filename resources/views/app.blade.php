<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quote Generation</title>
    @include('layout.partials.head')
</head>
<body>
@if(\Illuminate\Support\Facades\Auth::user() != null)
{{--    @include('layout.partials.navbar')--}}
@endif
<div style="background-color: white" class="content">
    @inertia
</div>
</body>
</html>
