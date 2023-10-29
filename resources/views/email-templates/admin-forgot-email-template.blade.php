<p>Dear {{$admin->name}}</p>
<p>
    We are received a request to reset the password for Laravecom account associated with {{$admin->email}}.
    You can reset Your password bY clicking the button below:
    <a href="{{$actionLink}}" target="_blank" style="color: brown;border-color:blue">Reset Password</a>
    <br>
    <b>NB:</b> This link will valid within 15 minutes
    <br>
    If You did not request for a password reset, please ignore this email.
</p>