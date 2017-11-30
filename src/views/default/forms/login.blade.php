<div class="login">
    <div class="columns large-2">&nbsp;</div>
    <div class="columns large-8 medium-text-center">
        <h1 style="color: white;">Login</h1>
        <div class="panel radius" style="background: #fff; border-radius: 10px; opacity: 0.88">
            <div class="row">
                <div class="columns large-12"><h2></h2></div>
            </div>
            <div class="row">
                <div class="columns large-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="columns large-4">Username</div>
                <div class="columns large-7">{{ Form::text('username', null) }}</div>
                <div class="columns large-1">&nbsp;</div>
            </div>
            <div class="row">
                <div class="columns large-4">Password</div>
                <div class="columns large-7">{{ Form::password('password', null) }}</div>
                <div class="columns large-1">&nbsp;</div>
            </div>
            <div class="row">
                <div class="columns large-12">
                    {{ Form::button('Sign in', ['class' => 'button small radius']) }} &nbsp;  <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="row">
                <div class="columns large-12">
                   <br />
                    {{-- Form::checkbox('remember', 1) }} Remember me?
                    {{ Form::hidden('remember_hidden', null) --}}
                </div>
            </div>
        </div>

    </div>
    <div class="columns large-2">&nbsp;</div>
</div>