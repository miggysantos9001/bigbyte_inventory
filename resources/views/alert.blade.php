@if ($errors->any())
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
        <div class="text-white">Check out the errors</div>
        <ul style="margin-top:10px;">
            @foreach ($errors->all() as $error)
                <li><span style="font-weight: bold;margin-top:10px;text-transform:uppercase;color:white;">{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
@endif