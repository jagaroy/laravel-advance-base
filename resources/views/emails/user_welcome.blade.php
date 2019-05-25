Hello <i>{{ $data['receiver_name'] }}</i>,
<p>This is a demo email for testing purposes! HTML version.</p>

 
<p><u>Values passed by With method:</u></p>
 
<div>
<p><b>VarOne:</b>&nbsp;{{ $Var1 }}</p>
<p><b>VarTwo:</b>&nbsp;{{ $Var2 }}</p>
</div>
 
Thank You,
<br/>
<i>{{ $data['sender_name'] }}</i>