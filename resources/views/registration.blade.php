@extends('layout.main')

<body style="background-color: rgba(176, 82, 82, 1);">
    


@section('container')
<h2 class="text-center">Registration</h2>
<div></div>
<div class="row g-3">
    <div class="col">
        <label for="Username" class="text-center">Username</label>
        <input type="text" placeholder="Username" required>
    </div>
    <div class="col">
        <label for="Email">Email</label>
        <input type="text" placeholder="Email" required>
    </div>
    <div class="col">
        <label for="PhoneNumber">PhoneNumber</label>
        <input type="number" name="phonenumber" placeholder="PhoneNumber">
    </div>
</div>
<div class="row g-3" >
    <div class="col">
        <label for="Password">Password</label>
        <input type="password" name = "password"placeholder="Password">
    </div>
</div>
<div class=""></div>

</body>
@endsection
