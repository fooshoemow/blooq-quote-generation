<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quote Generation</title>
    @include('layout.partials.head')
</head>
<body>
@if(\Illuminate\Support\Facades\Auth::user() != null)
    @include('layout.partials.navbar')
@endif
<div class="content bg-gray-100" style="padding: 50px 20px">
    @inertia
</div>
</body>
</html>
